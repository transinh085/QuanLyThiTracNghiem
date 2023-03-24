<?php
require_once "./mvc/models/NguoiDungModel.php";
class AuthCore{

    public static function onLogin(){
        if(isset($_COOKIE['token'])){
            $nguoidung = new NguoiDungModel();
            $token = $_COOKIE['token'];
            if($nguoidung->validateToken($token) == true){
                header("Location: ./dashboard");
            }
        }
    }

    public static function checkAuthentication()
    {
        $token = $_COOKIE['token'];
        $nguoidung = new NguoiDungModel();
        if(!isset($_COOKIE['token']) || $nguoidung->validateToken($token) == false){
            header("Location: ./auth");
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


