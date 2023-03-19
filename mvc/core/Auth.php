<?php require_once "./mvc/models/NguoiDungModel.php" ?>
<?php
class Auth
{
    public static function checkAuthentication()
    {
        $token = $_COOKIE['token'];
        $nguoidung = new NguoiDungModel();
        if ($nguoidung->validateToken($token) == null) {
            header("Location: ./auth/signin");
            exit;
        }
    }

    public static function checkPer($chucnang, $hanhdong)
    {
        $valid = isset($_COOKIE['token']);
        if($valid) $valid = in_array($hanhdong, $_SESSION["user_role"][$chucnang]);
        if($valid) return true;
        else return false;
    }
}


