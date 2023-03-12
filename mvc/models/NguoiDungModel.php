<?php
class NguoiDungModel extends DB{
    
    public function create($email, $fullname , $ngaysinh, $gioitinh, $role)
    {
        // $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `nguoidung`(`email`, `id`,`hoten`, `gioitinh`,`ngaysinh`, `trangthai`, `manhomquyen`) VALUES ('$email', NULL ,'$fullname','$gioitinh','$ngaysinh',1, $role)";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $check = false;
        }
        return json_encode($check);
    }

    public function delete($id) 
    {
        $check = true;
        $sql = "DELETE FROM `nguoidung` WHERE `id`='$id'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $check = false;
        return $check;
    }

    public function update($email,$hoten,$gioitinh,$ngaysinh) 
    {
        $check = true;
        $sql = "UPDATE `nguoidung` SET `hoten`='$hoten', `gioitinh`='$gioitinh', `ngaysinh`='$ngaysinh' WHERE `email`='$email'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $check = false;
        return $check;
    }

    public function getAll()
    {
        $sql = "SELECT nguoidung.*, nhomquyen.`tennhomquyen`
        FROM nguoidung, nhomquyen
        WHERE nguoidung.`manhomquyen` = nhomquyen.`manhomquyen`";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($email)
    {
        $sql = "SELECT * FROM `nguoidung` WHERE `email` = '$email'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function changePassword($email,$new_password)
    {
        $new_password = password_hash($new_password,PASSWORD_DEFAULT);
        $sql = "UPDATE `nguoidung` SET `matkhau`='$new_password' WHERE `email` = '$email'";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $check = false;
        }
        return json_encode($check);
    }
}
?>