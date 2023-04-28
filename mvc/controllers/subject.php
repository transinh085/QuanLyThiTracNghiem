<?php
require_once "./mvc/core/AuthCore.php";

class Subject extends Controller{
    public $monHocModel;
    public $chuongModel;

    public function __construct()
    {
        $this->monHocModel = $this->model("MonHocModel");
        $this->chuongModel = $this->model("ChuongModel");
        require_once "./mvc/core/Pagination.php";
    }

    public function default() 
    {    
        AuthCore::checkAuthentication();
        if(AuthCore::checkPermission("monhoc","view")) {
            $this->view("main_layout",[
                "Page" => "subject",
                "Title" => "Quản lý môn học",
                "Script" => "subject",
                "Plugin" => [
                    "sweetalert2" => 1,
                    "jquery-validate" => 1,
                    "notify" => 1,
                    "pagination" => [],
                ]
            ]);
        } else $this->view("single_layout", ["Page" => "error/page_403","Title" => "Lỗi !"]);
    }

    public function add()
    {
            $mamon = $_POST['mamon'];
            $tenmon = $_POST['tenmon'];
            $sotinchi = $_POST['sotinchi'];
            $sotietlythuyet = $_POST['sotietlythuyet'];
            $sotietthuchanh = $_POST['sotietthuchanh'];
            $result = $this->monHocModel->create($mamon,$tenmon,$sotinchi,$sotietlythuyet,$sotietthuchanh);
            echo $result;
    }

    public function checkSubject() 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $mamon = $_POST['mamon'];
            $tenmon = $_POST['tenmon'];
            $result = $this->monHocModel->checkSubject($tenmon, $mamon);
            echo json_encode($result);
        }
    }

    public function update(){
            $id = $_POST['id'];
            $mamon = $_POST['mamon'];
            $tenmon = $_POST['tenmon'];
            $sotinchi = $_POST['sotinchi'];
            $sotietlythuyet = $_POST['sotietlythuyet'];
            $sotietthuchanh = $_POST['sotietthuchanh'];
            $result = $this->monHocModel->update($id,$mamon,$tenmon,$sotinchi,$sotietlythuyet,$sotietthuchanh);
            echo $result;
    }

    public function delete(){
            $mamon = $_POST['mamon'];
            $result = $this->monHocModel->delete($mamon);
            echo $result;
    }

    public function getData()
    {
            $data = $this->monHocModel->getAll();
            echo json_encode($data);
    }

    public function getSubjectAssignment()
    {
        $id = $_SESSION['user_id'];
        $data = $this->monHocModel->getAllSubjectAssignment($id);
        echo json_encode($data);
    }

    public function getDetail()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $this->monHocModel->getById($_POST['mamon']);
            echo json_encode($data);
        }
        echo false;
    }

    //Chapter
    public function getAllChapter(){
            $result = $this->chuongModel->getAll($_POST['mamonhoc']);
            echo json_encode($result);
    }

    public function chapterDelete(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->chuongModel->delete($_POST['machuong']);
            echo $result;
        }
    }

    public function addChapter(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->chuongModel->insert($_POST['mamonhoc'],$_POST['tenchuong']);
            echo $result;
        }
    }

    public function updateChapter()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->chuongModel->update($_POST['machuong'], $_POST['tenchuong']);
            echo $result;
        }
    }

    public function search() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->monHocModel->search($_POST['input']);
            echo json_encode($result);
        }
    }

    public function getQuery($filter, $input, $args) {
        $result = $this->monHocModel->getQuery($filter, $input, $args);
        return $result;
    }
}
?>