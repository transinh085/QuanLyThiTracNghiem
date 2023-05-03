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
        $sql = "SELECT `thongbao`.`matb`, `noidung`, `avatar` 
        FROM `thongbao`,`chitietthongbao`,`chitietnhom`,`nguoidung` 
        WHERE `thongbao`.`matb` = `chitietthongbao`.`matb` AND `chitietthongbao`.`manhom` = `chitietnhom`.`manhom` AND `nguoitao` = `id`
        AND `chitietthongbao`.`manhom` = $manhom";
        $result = mysqli_query($this->con,$sql);
        // $rows = array();
        // while($row = mysqli_fetch_assoc($result)){
        //     $rows[] = $row;
        // }
        // return $rows;
        return mysqli_fetch_assoc($result);
    }
}
?>