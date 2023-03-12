<?php
class NhomModel extends DB {
    // nhomhocphan
    public function getAll()
    {
        $sql = "SELECT * FROM `nhomhocphan`";
        return mysqli_query($this->con, $sql);
    }

    public function insert($name) 
    {
        // $sql = "INSERT INTO `nhomhocphan`(`manhom`, `tennhom`, `mamoi`, `siso`, `ghichu`, `giangvien`, `manhomhp`) VALUES (NULL,'$name')";
        $sql = "INSERT INTO `nhomhocphan`(`manhomhocphan`, `tennhomhocphan`, `khoa`) VALUES (NULL, '$name', 0)";
        return mysqli_query($this->con, $sql);
    }

    public function update($id, $name)
    {
        $sql = "UPDATE `nhomhocphan` SET `tennhomhocphan` = '$name' WHERE `nhomhocphan`.`manhomhocphan` = $id";
        return mysqli_query($this->con, $sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `nhomhocphan` WHERE `nhomhocphan`.`manhomhocphan` = $id";
        return mysqli_query($this->con, $sql);
    }

    public function getClass($id)
    {
        $sql = "SELECT `nhom`.* FROM `nhom`, `nhomhocphan` WHERE `nhom`.`manhomhp` = `nhomhocphan`.`manhomhocphan` AND `nhom`.`manhomhp` = '$id'";
        return mysqli_query($this->con, $sql);
        // $result = mysqli_query($this->con, $sql);
        // $rows = array();
        // while($row = mysqli_fetch_assoc($result)) {
        //     $rows[] = $row;
        // }
        // return $rows;
    }
}
?>