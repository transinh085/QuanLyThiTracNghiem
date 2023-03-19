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

    public function update($id,$email,$fullname,$password,$ngaysinh,$gioitinh,$role,$trangthai)
    {
        $querypass = '';
        if($password != '') {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $querypass = ", `matkhau`='$password'";
        }
        $sql = "UPDATE `nguoidung` SET `email`='$email', `hoten`='$fullname',`gioitinh`='$gioitinh',`ngaysinh`='$ngaysinh',`trangthai`='$trangthai',`manhomquyen`='$role'$querypass WHERE `id`='$id'";
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
            $_SESSION['user_role'] = $this->getRole($row['manhomquyen']);
            return true;
        }
        return false;
    }

    public function getRole($manhomquyen)
    {
        $sql = "SELECT chucnang, hanhdong FROM chitietquyen WHERE manhomquyen = $manhomquyen";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $roles = array();
        foreach ($rows as $item) {
            $chucnang = $item['chucnang'];
            $hanhdong = $item['hanhdong'];
            if (!isset($roles[$chucnang])) {
                $roles[$chucnang] = array($hanhdong);
            } else {
                array_push($roles[$chucnang], $hanhdong);
            }
        }
        return $roles;
    }

    public function logout(){
        setcookie("token","",time()-10,'/');
        $id = $_SESSION['user_id'];
        $sql = "UPDATE `nguoidung` SET `token`= NULL WHERE `id` = '$id'";
        session_destroy();
        $result = mysqli_query($this->con,$sql);
        return $result;
    }

    public function updateOpt($opt,$email){
        $sql = "UPDATE `nguoidung` SET `opt`='$opt' WHERE `email`='$email'";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }
}
?>