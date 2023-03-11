<?php
class CauHoiModel extends DB{
    public function create($noidung, $dokho, $mamonhoc, $machuong, $nguoitao)
    {
        $sql = "INSERT INTO `cauhoi`(`noidung`, `dokho`, `mamonhoc`, `machuong`, `nguoitao`) VALUES ('$noidung','$dokho','$mamonhoc','$machuong','$nguoitao')";
        $result = mysqli_query($this->con, $sql);
        return $this->con;
    }

    public function update($macauhoi, $noidung, $dokho, $mamonhoc, $machuong, $nguoitao)
    {
        $valid = true;
        $sql = "UPDATE `cauhoi` SET `noidung`='$noidung',`dokho`='$dokho',`mamonhoc`='$mamonhoc',`machuong`='$machuong',`nguoitao`='$nguoitao' WHERE `macauhoi`=$macauhoi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($macauhoi)
    {
        $valid = true;
        $sql = "DELETE FROM `cauhoi` WHERE `macauhoi`= $macauhoi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `cauhoi`";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($macauhoi)
    {
        $sql = "SELECT * FROM `cauhoi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con,$sql);
        return mysqli_fetch_assoc($result);
    }
}
?>