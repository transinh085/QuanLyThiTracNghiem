<?php
class LopModel extends DB{
    // nhom
    public function insert($name, $note, $group) 
    {
        // fix so 5, ma~ moi`
        $sql = "INSERT INTO `nhom`(`manhom`, `tennhom`, `mamoi`, `siso`, `ghichu`, `giangvien`, `manhomhp`) VALUES (NULL, '$name', '', 0, '$note', 5, '$group')";
        mysqli_query($this->con, $sql);
        // if($group != 0) {
        //     $id = mysqli_insert_id($this->con);
        //     $sql1 = "INSERT INTO `chitietnhom`(`manhom`, `malop`) VALUES ($group,$id)";
        //     mysqli_query($this->con, $sql1);
        // }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `nhom` WHERE manhom = $id";
        return mysqli_query($this->con, $sql);
    }

    // chitietnhom

}
?>