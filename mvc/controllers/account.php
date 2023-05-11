<?php

class Account extends Controller
{
    public $nguoidung;

    public function __construct()
    {
        $this->nguoidung = $this->model("NguoiDungModel");
        parent::__construct();
    }

    function default()
    {
        AuthCore::checkAuthentication();
        $this->view("main_layout", [
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matkhaucu = $_POST['matkhaucu'];
            $matkhaumoi = $_POST['matkhaumoi'];
            $id = $_SESSION['user_id'];
            $valid = $this->nguoidung->checkPassword($id, $matkhaucu);
            if ($valid) {
                $result = $this->nguoidung->changePassword($id, $matkhaumoi);
                if ($result) echo json_encode(["message" => "Thay đổi mật khẩu thành công !", "valid" => true]);
            } else {
                echo json_encode(["message" => "Mật khẩu không đúng", "valid" => false]);
            }
        }
    }

    public function changeProfile()
    {
        AuthCore::checkAuthentication();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $id = $_SESSION['user_id'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            if ($email == $_SESSION['user_email']) {
                $result = $this->nguoidung->updateProfile($hoten, $gioitinh, $ngaysinh, $email, $id);
                if ($result) {
                    echo json_encode(["message" => "Thay đổi hồ sơ thành công !", "valid" => true]);
                }
            } else {
                $check = $this->nguoidung->checkEmailExist($email);
                if ($check == 0) {
                    $result = $this->nguoidung->updateProfile($hoten, $gioitinh, $ngaysinh, $email, $id);
                    if ($result) {
                        echo json_encode(["message" => "Thay đổi hồ sơ thành công !", "valid" => true]);
                    }
                } else {
                    echo json_encode(["message" => "Địa chỉ email đã tồn tại !", "valid" => false]);
                }
            }
        }
    }

    public function checkAllow()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_SESSION['user_id'];
            $email = $_POST['email'];
            $result = $this->nguoidung->updateProfile($id, $email);
        }
    }

    public function uploadFile()
    {
        AuthCore::checkAuthentication();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES['file-img']['name'])) {
                $id = $_SESSION['user_id'];
                $imageName = $_FILES['file-img']['name'];
                $tmpName = $_FILES['file-img']['tmp_name'];

                // Image extension validation
                $validImageExtension = ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $imageName);

                $name = $imageExtension[0];
                $imageExtension = strtolower(end($imageExtension));
                $result = $this->nguoidung->uploadFile($id, $tmpName, $imageExtension, $validImageExtension, $name);
                echo json_encode($result);
            }
        }
    }

    public function getRole()
    {
        AuthCore::checkAuthentication();
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo json_encode($_SESSION['user_role']);
        }
    }

    public function check()
    {
        echo "<pre>";
        print_r($_SESSION);
    }
}
