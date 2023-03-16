<?php
class CauTraLoiModel extends DB{
    public function create($macauhoi, $noidungtl, $ladapan)
    {
        $valid = true;
        $sql = "INSERT INTO `cautraloi`(`macautl`,`macauhoi`, `noidungtl`, `ladapan`) VALUES (NULL,$macauhoi,'$noidungtl','$ladapan')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function update($macautl, $macauhoi, $noidungtl, $ladapan)
    {
        $valid = true;
        $sql = "UPDATE `cautraloi` SET `macauhoi`=$macauhoi,`noidungtl`='$noidungtl',`ladapan`='$ladapan' WHERE `macautl`='$macautl'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($macautl)
    {
        $valid = true;
        $sql = "DELETE FROM `cautraloi` WHERE `macautl` = $macautl";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getAll($macauhoi)
    {
        $sql = "SELECT * FROM `cautraloi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($macautl)
    {
        $sql = "SELECT * FROM `cautraloi` WHERE `macautl` = $macautl";
        $result = mysqli_query($this->con,$sql);
        return mysqli_fetch_assoc($result);
    }

    public function deletebyanswer($macauhoi)
    {
        $valid = true;
        $sql = "DELETE FROM `cautraloi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }
}
?>