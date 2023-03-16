<?php
class Account extends Controller{
    public $nguoidung;

    public function __construct()
    {
        $this->nguoidung = $this->model("NguoiDungModel");
    }

    function default() {
        $this->view("main_layout",[
            "Page" => "account_setting",
            "Title" => "Trang cá nhân",
            "User" => $this->nguoidung->getById($_SESSION['user_id'])
        ]);
    }

    public function check()
    {
        echo "<pre>";
        print_r($_SESSION);
    }
}

?>