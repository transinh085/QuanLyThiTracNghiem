<?php
class LopModel extends DB{
    public function insert($name,$group) 
    {
        $sql = "INSERT INTO `lop`(`malop`, `tenlop`) VALUES (NULL,'$name')";
        mysqli_query($this->con, $sql);
        if($group != 0) {
            $id = mysqli_insert_id($this->con);
            $sql1 = "INSERT INTO `chitietnhom`(`manhom`, `malop`) VALUES ($group,$id)";
            mysqli_query($this->con, $sql1);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `lop` WHERE malop = $id";
        return mysqli_query($this->con, $sql);
    }
}


?>