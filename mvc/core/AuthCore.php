<?php
require_once "./mvc/models/NguoiDungModel.php";
class AuthCore{

    public static function onLogin(){
        $nguoidung = new NguoiDungModel();
        if(isset($_COOKIE['token'])){
            $token = $_COOKIE['token'];
            if($nguoidung->validateToken($token) != null){
                header("Location: ./dashboard");
            }
        }
    }

    public static function checkAuthentication()
    {
        $token = $_COOKIE['token'];
        $nguoidung = new NguoiDungModel();
        if(!isset($_COOKIE['token']) || $nguoidung->validateToken($token) == null){
            header("Location: ./auth/signin");
            exit;
        }
    }


    public static function checkPermission($chucnang, $hanhdong)
    {
        self::checkAuthentication();
        $valid = in_array($hanhdong, $_SESSION["user_role"][$chucnang]);
        return $valid;
    }
}


