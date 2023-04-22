<?php
class ChuongModel extends DB {
    public function getAll($mamonhoc)
    {
        $sql = "SELECT * FROM `chuong` WHERE mamonhoc = '$mamonhoc' AND `trangthai` = 1";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function insert($mamonhoc,$tenchuong) 
    {
        $valid = true;
        $sql = "INSERT INTO `chuong`(`mamonhoc`,`tenchuong`,`trangthai`) VALUES ('$mamonhoc','$tenchuong',1)";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $valid = false;
        return $valid;
    }   

    public function delete($machuong)
    {
        $valid = true;
        $sql = "UPDATE `chuong` SET `trangthai`= 0 WHERE `machuong` = '$machuong'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function update($machuong,$tenchuong) 
    {
        $valid = true;
        $sql = "UPDATE `chuong` SET `tenchuong`='$tenchuong' WHERE `machuong` = '$machuong'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $valid = false;
        return $valid;
    } 
}