<?php
class NguoiDungModel extends DB{
    
    public function create($email,$fullname,$password,$ngaysinh,$gioitinh,$role,$trangthai)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `nguoidung`(`email`,`hoten`, `gioitinh`,`ngaysinh`,`matkhau`,`trangthai`, `manhomquyen`) VALUES ('$email','$fullname','$gioitinh','$ngaysinh','$password',$trangthai, $role)";
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

    public function update($email,$fullname,$password,$ngaysinh,$gioitinh,$role,$trangthai)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE `nguoidung` SET `email`='[value-1]',`id`='[value-2]',`googleid`='[value-3]',`hoten`='[value-4]',`gioitinh`='[value-5]',`ngaysinh`='[value-6]',`avatar`='[value-7]',`ngaythamgia`='[value-8]',`matkhau`='[value-9]',`trangthai`='[value-10]',`sodienthoai`='[value-11]',`token`='[value-12]',`otp`='[value-13]',`manhomquyen`='[value-14]' WHERE 1";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $check = false;
        }
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

    public function getById($id)
    {
        $sql = "SELECT * FROM `nguoidung` WHERE `id` = '$id'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getByEmail($id)
    {
        $sql = "SELECT * FROM `nguoidung` WHERE `email` = '$id'";
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

    public function checkLogin($email,$password){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $user = $this->getByEmail($email);
        if($user == ''){
            return "Tài khoản không tồn tại";
        } else {
            $sql = "SELECT * FROM `nguoidung` WHERE `email` = '$email' && 'password'='$password'";
            $result = mysqli_query($this->con, $sql);
            if($result){
                $email = $user['email'];
                $token = time().password_hash($email,PASSWORD_DEFAULT);
                setcookie("token", $token, time() + 7*24*60*60, "/");
                $sqlToken = "UPDATE `nguoidung` SET `token`='$token' WHERE `email` = '$email'";
                $resultToken = mysqli_query($this->con,$sqlToken);
                if($resultToken){
                    return "Đăng nhập thành công";
                } else {
                    return "Đăng nhập không thành công";
                }
                
            } else {
                return "Mật khẩu không khớp";
            }
        }
    }

    public function validateToken($token){
        $sql = "SELECT * FROM `nguoidung` WHERE `token` = '$token'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['hoten'];
            return true;
        }
        return false;
    }

    public function getRole($manhomquyen)
    {
        $sql = "SELECT chucnang, hanhdong FROM chitietquyen WHERE manhomquyen = $manhomquyen";
        $result = mysqli_query($this->con, $sql);
        $roles = array();
        while($row = mysqli_fetch_assoc($result)) {
            $roles[] = $row;
        }
        return $roles;
    }

    public function logout(){
        setcookie("token","",time()-10,'/');
        $id = $_SESSION['user_id'];
        $sql = "UPDATE `nguoidung` SET `token`='null' WHERE `id` = '$id'";
        $_SESSION['user_id'] = "";
        $_SESSION['user_email'] = "";
        $_SESSION['user_name'] = "";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }
}
?>