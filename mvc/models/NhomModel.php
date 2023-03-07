<?php
class NhomModel extends DB{
    public function getAll()
    {
        $sql = "SELECT * FROM `nhom`";
        return mysqli_query($this->con, $sql);
    }

    public function insert($name) 
    {
        $sql = "INSERT INTO `nhom`(`manhom`, `tennhom`) VALUES (NULL,'$name')";
        return mysqli_query($this->con, $sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `nhom` WHERE manhom = $id";
        return mysqli_query($this->con, $sql);
    }

    public function getClass($id)
    {
        $sql = "SELECT lop.malop,lop.tenlop FROM  `chitietnhom`, `lop` WHERE chitietnhom.manhom = $id AND chitietnhom.malop = lop.malop";
        return mysqli_query($this->con, $sql);
    }
}
?>