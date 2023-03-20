<?php
class GiaoDeThiModel extends DB{
    public function create($made,$manhom)
    {
        $valid = true;
        $sql = "INSERT INTO `giaodethi`(`made`, `manhom`) VALUES ('$made','$manhom')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($made, $manhom) {
        $valid = true;
        $sql = "DELETE FROM `giaodethi` WHERE `made`='$made',`manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }
}

?>