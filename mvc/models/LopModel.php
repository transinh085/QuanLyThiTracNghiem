<?php
class LopModel extends DB{
    // nhom
    public function create($name, $note, $group) 
    {
        $valid = true;
        $sql = "INSERT INTO `nhom`(`tennhom`,`ghichu`,`giangvien`, `manhomhp`) VALUES ('$name','$note', 1, $group)";
        $result =  mysqli_query($this->con, $sql);
        return $result;
        // if(!$result) $valid = false;
        // return $valid;
    }

    public function delete($id)
    {
        $valid = true;
        $sql = "DELETE FROM `nhom` WHERE manhom = $id";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getInfo($id)
    {
        $sql = "SELECT * FROM `nhom` WHERE manhom = $id";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function update($id, $name, $note) {
        $sql = "UPDATE `nhom` SET `tennhom` = '$name', `ghichu` = '$note' WHERE `nhom`.`manhom` = $id";
        return mysqli_query($this->con, $sql);
    }

    // chitietnhom

}
?>