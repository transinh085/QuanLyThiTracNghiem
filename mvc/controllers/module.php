<?php
    class Module extends Controller {
        public $lopModel;
        public $nhomModel;

        function __construct() {
            $this->lopModel = $this->model("LopModel");
            $this->nhomModel = $this->model("NhomModel");
        }

        public function default()
        {
            $this->view("main_layout", [
                "Page" => "module",
                "Title" => "Quản lý nhóm học phần",
                "Script" => "module",
                "Plugin" => [
                    "notify" => 1
                ]
            ]);
        }

        public function detail($id)
        {
            $this->view("main_layout", [
                "Page" => "class_detail",
                "Title" => "Quản lý lớp học",
                "Plugin" => [
                    "datepicker" => 1,
                    "flatpickr" => 1
                ],
                "Script" => "class_detail"
            ]);
        }

        public function addGroup()
        {
            if(isset($_POST['name'])) {
                $gr = $this->model("NhomModel");
                $gr->insert($_POST['name']);
            }
        }

        public function addClass()
        {
            $note = "";
            $group = 0;

            if(isset($_POST['note'])) {
                $note = $_POST['note'];
            }

            if(isset($_POST['group'])) {
                $group = $_POST['group'];
            }

            if(isset($_POST['name'])) {
                $c = $this->model("LopModel");
                $c->insert($_POST['name'], $note, $group);
            }
        }

        public function loadDataGroup()
        {
            $arr = $this->nhomModel->getAll();
            $result = array();
            while($row = mysqli_fetch_assoc($arr)) {
                array_push($result,$row);
            }
            echo json_encode($result);
        }

        public function loadDataClass()
        {
            $arr = $this->nhomModel->getAll();
            $result = array();
            while($row = mysqli_fetch_assoc($arr)) {
                $row['class'] = array();
                $cl = $this->nhomModel->getClass($row['manhomhocphan']);
                while($row_cl = mysqli_fetch_assoc($cl)) {
                    array_push($row['class'],$row_cl);
                }
                array_push($result,$row);
            }
            echo json_encode($result);
        }

        public function deleteGroup()
        {
            if(isset($_POST['id'])) {
                $this->nhomModel->delete($_POST['id']);
            }
        }

        public function deleteClass()
        {
            if(isset($_POST['id'])) {
                $this->lopModel->delete($_POST['id']);
            }
        }

        public function updateGroup()
        {
            if(isset($_POST['id']) && isset($_POST['name'])) {
                $this->nhomModel->update($_POST['id'], $_POST['name']);
            }
        }

        public function getClass()
        {
            if(isset($_POST['id'])) {
                $result = $this->lopModel->getInfo($_POST['id']);
                echo json_encode($result);
            }
        }

        public function updateClass()
        {
            if (isset($_POST['id'], $_POST['name'], $_POST['note'])) {
                $this->lopModel->update($_POST['id'], $_POST['name'], $_POST['note']);
            }
        }
    }
?>