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
        $sql = "SELECT DISTINCT `thongbao`.`matb`, `noidung`, `avatar` ,`thoigiantao`
        FROM `thongbao`,`chitietthongbao`,`chitietnhom`,`nguoidung` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `chitietnhom`.`manhom` AND `nguoitao` = `id`
        AND `chitietthongbao`.`manhom` = $manhom ORDER BY thoigiantao DESC";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getAll($user_id) 
    {
        $sql = "SELECT `chitietthongbao`.`matb`,`tennhom`,`noidung`, `tenmonhoc` ,`namhoc`, `hocky`, `thoigiantao`
        FROM `thongbao`, `chitietthongbao`,`nhom`,`monhoc` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `nhom`.`manhom` AND `nhom`.`mamonhoc` = `monhoc`.`mamonhoc`
        AND `thongbao`.`nguoitao` = $user_id ORDER BY thoigiantao DESC";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $matb = $row['matb'];
            $index = array_search($matb, array_column($rows, 'matb'));
            if ($index === false) {
                $item = [
                    "matb" => $matb,
                    "noidung" => $row['noidung'],
                    "tenmonhoc" => $row['tenmonhoc'],
                    "namhoc" => $row['namhoc'],
                    "hocky" => $row['hocky'],
                    "thoigiantao" => $row['thoigiantao'],
                    "nhom" => [$row['tennhom']]
                ];
                array_push($rows, $item);
            } else {
                array_push($rows[$index]["nhom"], $row['tennhom']);
            }
        }
        return $rows;
    }

    public function deleteAnnounce($matb)
    {  
        $result = $this->deleteDetailAnnounce($matb);
        if ($result) {
            $sql = "DELETE FROM `thongbao` WHERE `matb` = $matb";
            $result = mysqli_query($this->con,$sql);
            return true;
        } else return false;
    }


    // Xóa thông báo trong bảng thongbao
    public function deleteDetailAnnounce($matb)
    {
        $valid = true;
        $sql = "DELETE FROM `chitietthongbao` WHERE `matb` = $matb";
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

    public function updateAnnounce($matb,$noidung,$nhom)
    {
        $valid = true;
        $sql = "UPDATE `thongbao` SET `noidung`='$noidung' WHERE `matb` = $matb" ;
        $result = mysqli_query($this->con, $sql);
        if($result) {
            $this->deleteDetailAnnounce($matb);
            $this->sendAnnouncement($matb, $nhom);
        } else $valid = false;
        return $valid; 
    }

    public function getNotifications($id)
    {
        $sql = "SELECT  `tennhom`,`avatar`,`noidung`, `thoigiantao` ,`chitietnhom`.`manhom` , monhoc.mamonhoc, monhoc.tenmonhoc
        FROM `thongbao`,`chitietthongbao`,`chitietnhom`, `nguoidung`,`nhom` ,`monhoc`
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `chitietnhom`.`manhom` 
        AND `thongbao`.`nguoitao` = `nguoidung`.`id` 
        AND `chitietnhom`.`manhom` = `nhom`.`manhom`
        AND `monhoc`.`mamonhoc` = `nhom`.`mamonhoc`
        AND `chitietnhom`.`manguoidung` = $id
        ORDER BY thoigiantao DESC";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getQuery($filter, $input, $args) {
        $query = "SELECT TB.*, tenmonhoc, namhoc, hocky, GROUP_CONCAT(N.tennhom SEPARATOR ', ') AS nhom FROM thongbao TB, chitietthongbao CTTB, nhom N, monhoc MH WHERE TB.matb = CTTB.matb AND CTTB.manhom = N.manhom AND N.mamonhoc = MH.mamonhoc AND TB.nguoitao = ".$args['id'];
        if ($input) {
            $query .= " AND noidung LIKE N'%${input}%'";
        }
        $query .= " GROUP BY TB.matb ORDER BY thoigiantao DESC";
        return $query;
    }
}
?>