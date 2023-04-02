<?php
    class Module extends Controller {
        public $nhomModel;

        function __construct() {
            $this->nhomModel = $this->model("NhomModel");
            parent::__construct();
        }

        public function default()
        {
            $this->view("main_layout", [
                "Page" => "module",
                "Title" => "Quản lý nhóm học phần",
                "Script" => "module",
                "Plugin" => [
                    "sweetalert2" => 1,
                    "select" => 1,
                    "notify" => 1
                ]
            ]);
        }

        public function detail($id)
        {
            $this->view("main_layout", [
                "Page" => "class_detail",
                "Title" => "Quản lý nhóm",
                "Plugin" => [
                    "datepicker" => 1,
                    "flatpickr" => 1
                ],
                "Script" => "class_detail"
            ]);
        }

        public function loadData()
        {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $hienthi = $_POST['hienthi'];
                $user_id = $_SESSION['user_id'];
                $result = $this->nhomModel->getBySubject($user_id,$hienthi);
                echo json_encode($result);
            }
        }

        public function add()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tennhom = $_POST['tennhom'];
                $ghichu = $_POST['ghichu'];
                $monhoc = $_POST['monhoc'];
                $namhoc = $_POST['namhoc'];
                $hocky = $_POST['hocky'];
                $giangvien = $_SESSION['user_id'];
                $result = $this->nhomModel->create($tennhom,$ghichu,$namhoc,$hocky,$giangvien,$monhoc);
                echo $result;
            }
        }

        public function delete()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $manhom = $_POST['manhom'];
                $result = $this->nhomModel->delete($manhom);
                echo $result;
            }
        }

        public function update()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $manhom = $_POST['manhom'];
                $tennhom = $_POST['tennhom'];
                $ghichu = $_POST['ghichu'];
                $monhoc = $_POST['monhoc'];
                $namhoc = $_POST['namhoc'];
                $hocky = $_POST['hocky'];
                $result = $this->nhomModel->update($manhom,$tennhom,$ghichu,$namhoc,$hocky,$monhoc);
                echo $result;
            }
        }

        public function hide()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $manhom = $_POST['manhom'];
                $giatri =$_POST['giatri'];
                $result = $this->nhomModel->hide($manhom,$giatri);
                echo $result;
            }
        }

        public function getDetail()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $manhom = $_POST['manhom'];
                $result = $this->nhomModel->getById($manhom);
                echo json_encode($result);
            }
        }


        public function updateInvitedCode()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $manhom = $_POST['manhom'];
                $result = $this->nhomModel->updateMaMoi($manhom);
                echo json_encode($result);
            }
        }

        public function getSvList() 
        {
            // if($_SERVER["REQUEST_METHOD"] == "POST") {
            //     $manhom = $_POST['manhom'];
                $result = $this->nhomModel->getSvList();
                echo json_encode($result);
            // }
        }
    }

    
?>