<?php
class MonHocModel extends DB{
    public function create($id,$name)
    {   
        $check = true;
        $sql = "INSERT INTO `monhoc`(`mamonhoc`, `tenmonhoc`) VALUES ('$id','$name')";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $check = false;
        return $check;
    }

    public function update($id, $name) 
    {
        $check = true;
        $sql = "UPDATE `monhoc` SET `tenmonhoc`='$name' WHERE `mamonhoc`='$id'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $check = false;
        return $check;
    }

    public function delete($id) 
    {
        $check = true;
        $sql = "DELETE FROM `monhoc` WHERE `mamonhoc`='$id'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $check = false;
        return $check;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `monhoc`";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM `monhoc` WHERE `mamonhoc` = '$id'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}

?>