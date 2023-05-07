<?php
class AnnouncementModel extends DB 
{
    
    public function create($mamonhoc,$thoigiantao,$nguoitao,$nhom,$content)
    {
        $sql = "INSERT INTO `thongbao`(`noidung`,`thoigiantao`,`nguoitao`) VALUES ('$content','$thoigiantao','$nguoitao')";
        $result = mysqli_query($this->con, $sql);
        if($result) {
            $matb = mysqli_insert_id($this->con);
            // Một thông báo gửi cho nhiều nhóm 
            $result = $this->sendAnnouncement($matb, $nhom);
            return $matb;
        } else return false;
    }


    public function sendAnnouncement($matb,$nhom)
    {
        $valid = true;
        foreach ($nhom as $manhom) {
            $sql = "INSERT INTO `chitietthongbao`(`matb`, `manhom`) VALUES ('$matb','$manhom')";
            $result = mysqli_query($this->con, $sql);
            if (!$result) $valid = false;
        }
        return $valid;
    }

    public function getAnnounce($manhom) {
        $sql = "SELECT DISTINCT `thongbao`.`matb`, `noidung`, `avatar` 
        FROM `thongbao`,`chitietthongbao`,`chitietnhom`,`nguoidung` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `chitietnhom`.`manhom` AND `nguoitao` = `id`
        AND `chitietthongbao`.`manhom` = $manhom";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getAll($user_id) 
    {
        $sql = "SELECT `chitietthongbao`.`matb`,`tennhom`,`noidung`, `tenmonhoc` ,`namhoc`, `hocky` 
        FROM `thongbao`, `chitietthongbao`,`nhom`,`monhoc` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `nhom`.`manhom` AND `nhom`.`mamonhoc` = `monhoc`.`mamonhoc`
        AND `thongbao`.`nguoitao` = $user_id";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function deleteAnnounce($matb)
    {
        $sql = "DELETE FROM `chitietthongbao` WHERE `matb` = $matb";
        $result = mysqli_query($this->con,$sql);
        if ($result) {
            $result = $this->deleteDetailAnnounce($matb);
            return true;
        } else return false;
    }

    // Xóa thông báo trong bảng thongbao
    public function deleteDetailAnnounce($matb)
    {
        $valid = true;
        $sql = "DELETE FROM `thongbao` WHERE `matb` = $matb";
        $result = mysqli_query($this->con,$sql);
        if (!$result) $valid = false;
        return $valid; 
    }

    public function getDetail($matb)
    {
        $sql_announce = "SELECT `thongbao`.`matb`,`noidung`, `tenmonhoc` ,`namhoc`, `hocky` 
        FROM `thongbao`, `chitietthongbao`,`nhom`,`monhoc` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `nhom`.`manhom` AND `nhom`.`mamonhoc` = `monhoc`.`mamonhoc`
        AND `thongbao`.`matb` = $matb";
        $result_announce = mysqli_query($this->con,$sql_announce);
        $thongbao = mysqli_fetch_assoc($result_announce);
        if($thongbao != null) {
            $sql_sendAnnounce = "SELECT `manhom` FROM `chitietthongbao` WHERE `matb` = $matb";
            $result_sendAnnounce = mysqli_query($this->con,$sql_sendAnnounce);
            $thongbao['nhom'] = array();
            while ($row = mysqli_fetch_assoc($result_sendAnnounce)) {
                $thongbao['nhom'][] = $row['manhom'];
            } 
        }
        return $thongbao;
    }

    public function updateAnnounce($matb,$mamonhoc,$noidung,$nhom)
    {
        $valid = true;
        $sql = "UPDATE `thongbao` SET `noidung`='$noidung' WHERE `matb` = $matb" ;
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid; 
    }

    public function getNotifications($id)
    {
        $sql = "SELECT  `tennhom`,`avatar`,`noidung`, `thoigiantao` ,`chitietnhom`.`manhom` FROM `thongbao`,`chitietthongbao`,`chitietnhom`, `nguoidung`,`nhom` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `chitietnhom`.`manhom` AND `thongbao`.`nguoitao` = `nguoidung`.`id` AND `chitietnhom`.`manhom` = `nhom`.`manhom`
        AND `chitietnhom`.`manguoidung` = $id";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

}
?>