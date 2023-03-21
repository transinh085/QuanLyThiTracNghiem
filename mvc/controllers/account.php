<?php

class Account extends Controller{
    public $nguoidung;

    public function __construct()
    {
        $this->nguoidung = $this->model("NguoiDungModel");
        parent::__construct();
    }

    function default() {
            $this->view("main_layout",[
                "Page" => "account_setting",
                "Title" => "Trang cá nhân",
                "User" => $this->nguoidung->getById($_SESSION['user_id']),
                "Plugin" => [
                    "sweetalert2" => 1,
                    "datepicker" => 1,
                    "flatpickr" => 1,
                    "jquery-validate" => 1,
                    "notify" => 1,
                ],
                "Script" => "account_setting"
            ]);
    }

    public function changePassword()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $matkhaucu = $_POST['matkhaucu'];
            $matkhaumoi = $_POST['matkhaumoi'];
            $email = $_SESSION['user_email'];
            $valid = $this->nguoidung->checkPassword($email, $matkhaucu);
            if($valid) {
                $result = $this->nguoidung->changePassword($email, $matkhaumoi);
                if($result) echo json_encode(["message" => "Thay đổi mật khẩu thành công !", "valid" => "true"]);
            } else {
                echo json_encode(["message" => "Mật khẩu không đúng", "valid" => "false"]);
            }
        }
    }

    public function check()
    {
        echo "<pre>";
        print_r($_SESSION);
    }
}

?>