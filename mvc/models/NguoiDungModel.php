<?php
class NguoiDungModel extends DB{
    
    public function create($fullname, $email, $password)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `nguoidung`(`email`, `hoten`, `matkhau`, `trangthai`,`nhomquyen`) VALUES ('$email','$fullname','$password',1,1)";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $check = false;
        }
        return json_encode($check);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `nguoidung`";
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

    public function checkLogin($email,$password){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $user = $this->getById($email);
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
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_name'] = $row['hoten'];
            }
            return true;
        }
        return false;
    }
}
?>