<?php

class teacher_announcement extends Controller{
    public $AnnouncementModel;

    public function __construct()
    {
        $this->AnnouncementModel = $this->model("AnnouncementModel");
        parent::__construct();
    }
    
    public function default()
    {
        AuthCore::checkAuthentication();
        if(AuthCore::checkPermission("thongbao","view")) {
            $this->view("main_layout",[
                "Page" => "teacher_announcement",
                "Title" => "Thông báo",
                "Script" => "announcement",
                "Plugin" => [
                    "sweetalert2" => 1,
                    "datepicker" => 1,
                    "flatpickr" => 1,
                    "notify" => 1,
                    "jquery-validate" => 1,
                    "select" => 1,
                ]
            ]);
        } else $this->view("single_layout", ["Page" => "error/page_403","Title" => "Lỗi !"]);
    }

    public function add()
    {
        AuthCore::checkAuthentication();
        if(AuthCore::checkPermission("thongbao","create")) {
            $this->view("main_layout",[
                "Page" => "add_announce",
                "Title" => "Tạo và gửi thông báo",
                "Script" => "announcement",
                "Plugin" => [
                    "sweetalert2" => 1,
                    "datepicker" => 1,
                    "flatpickr" => 1,
                    "notify" => 1,
                    "jquery-validate" => 1,
                    "select" => 1,
                ],
                "Action" => "create"
            ]);
        } else $this->view("single_layout", ["Page" => "error/page_403","Title" => "Lỗi !"]);
    }

    public function update($made)
    {
        AuthCore::checkAuthentication();
        if (AuthCore::checkPermission("thongbao", "update")) {
            $this->view("main_layout", [
                "Page" => "add_announce",
                "Title" => "Cập nhật thông báo",
                "Plugin" => [
                    "datepicker" => 1,
                    "flatpickr" => 1,
                    "select" => 1,
                    "notify" => 1,
                    "jquery-validate" => 1,
                    "sweetalert2" => 1,
                ],
                "Script" => "update_announce",
                "Action" => "update"
            ]);
        } else {
            $this->view("single_layout", ["Page" => "error/page_403", "Title" => "Lỗi !"]);
        }
    }
    
    public function sendAnnouncement()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mamonhoc = $_POST['mamonhoc'];
            $nguoitao = $_SESSION['user_id'];
            $manhom = $_POST['manhom'];
            $content = $_POST['noticeText'];
            $thoigiantao = $_POST['thoigiantao'];
            $valid = $this->AnnouncementModel->create($mamonhoc,$thoigiantao,$nguoitao,$manhom,$content);
            // if ($valid != "") {
            //     $result = $this->AnnouncementModel->sendAnnouncement($manhom);
            // }
            // echo json_encode($valid);
            // echo json_encode($valid);
            echo $valid;
        }
    }

        public function getAnnounce()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $manhom = $_POST["manhom"];
                $result = $this->AnnouncementModel->getAnnounce($manhom);
                echo json_encode($result);
            }
        }

        public function getDetail()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $matb = $_POST["matb"];
                $result = $this->AnnouncementModel->getDetail($matb);
                echo json_encode($result);
            }
        }

        public function getListAnnounce()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_SESSION['user_id'];
            $result = $this->AnnouncementModel->getAll($user_id);
            echo json_encode($result);
        }
    }

    public function deleteAnnounce()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matb = $_POST["matb"];
            $result = $this->AnnouncementModel->deleteAnnounce($matb);
            echo json_encode($result);
        }
    }

    public function updateAnnounce()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matb = $_POST["matb"];
            $mamonhoc = $_POST["mamonhoc"];
            $noidung = $_POST["noidung"];
            $manhom = $_POST["manhom"];
            $result = $this->AnnouncementModel->updateAnnounce($matb,$mamonhoc,$noidung,$manhom);
            echo json_encode($result);
        }
    }

    public function getNotifications()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $result = $this->AnnouncementModel->getNotifications($id);
            echo json_encode($result);
        }
    }
}
?>