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

    public function changeProfile()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $result = $this->nguoidung->updateProfile($hoten,$gioitinh,$ngaysinh, $email);
            if ($result) {
                echo json_encode(["message" => "Thay đổi hồ sơ thành công !", "valid" => "true"]);
            }
        }
    }

    // public function uploadFile()
    // {
    //     if ($_FILES['file']['name']!='') {
    //         $extension = explode(".", $_FILES['file']['name']);
    //         $file_extension = end($extension);
    //         $allowed_type = array("jpg", "jpeg", "png", "gif");
    //         if (in_array($file_extension, $allowed_type)) {
    //             $new_name = rand().".".$file_extension;
    //             $path = "controllers/".$new_name;
    //             if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    //                 echo '<img class="img-avatar" src="'.$path.'" alt="${file.name}">'
    //             }
    //         } else {
    //             echo '<script>alert("File ảnh không hiệu lực")</script>';
    //         }

    //     } else {
    //         echo '<script>alert("Chọn ảnh đê")</script>';
    //     }
    // }

    public function uploadFile()
    {
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
                $result = $this->nguoidung->uploadFile($id,$tmpName,$imageExtension, $validImageExtension,$name);
                echo json_encode($result);
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