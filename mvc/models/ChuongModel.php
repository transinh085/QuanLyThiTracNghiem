<?php
class ChuongModel extends DB {
    public function getAll($mamonhoc)
    {
        $sql = "SELECT * FROM `chuong` WHERE mamonhoc = '$mamonhoc'";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function insert($mamonhoc,$tenchuong) 
    {
        $sql = "INSERT INTO `chuong`(`mamonhoc`,`tenchuong`) VALUES ('$mamonhoc','$tenchuong')";
        mysqli_query($this->con,$sql);
    }   

    public function delete($machuong)
    {
        $sql = "DELETE FROM `chuong` WHERE machuong = '$machuong'";
        return mysqli_query($this->con, $sql);
    }

    public function update($machuong,$tenchuong) 
    {
        $sql = "UPDATE `chuong` SET `tenchuong`='$tenchuong' WHERE `machuong` = '$machuong' ";
        mysqli_query($this->con,$sql);
    } 
}