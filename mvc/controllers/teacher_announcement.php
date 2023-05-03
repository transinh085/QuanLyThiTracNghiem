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
    
}
?>