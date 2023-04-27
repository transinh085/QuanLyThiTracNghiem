<?php

class Dashboard extends Controller{

    public $nguoidung;

    public function __construct()
    {
        $this->nguoidung = $this->model("NguoiDungModel");
        parent::__construct();
    }

    function default(){
        AuthCore::checkAuthentication();
        $this->view("main_layout", [
            "Page" => "dashboard" ,
            "Title" => "Trang tổng quan",
            "User" => $this->nguoidung->getById($_SESSION['user_id']),
            "Plugin" => [
                "slick" => 1,
                "notify" => 1,
            ],
            "Script" => "dashboard"
        ]);
    }

    public function checkEmail(){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_SESSION["user_id"];
            $result = $this->nguoidung->checkEmail($id);
            echo $result;
        }
    }

    public function checkEmailExist(){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = $_POST['email'];
            $result = $this->nguoidung->checkEmailExist($email);
            echo $result;
        }
    }
}
?>