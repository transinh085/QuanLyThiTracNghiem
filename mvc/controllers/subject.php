<?php
class Subject extends Controller{
    public $monHocModel;
    public $chuongModel;

    public function __construct()
    {
        $this->monHocModel = $this->model("MonHocModel");
        $this->chuongModel = $this->model("ChuongModel");
    }

    public function default()
    {
        $this->view("main_layout",[
            "Page" => "subject",
            "Title" => "Quản lý môn học",
            "Script" => "subject",
            "Plugin" => [
                "sweetalert2" => 1,
                "notify" => 1
            ]
        ]);
    }

    public function add()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($this->checkPer('monhoc','create')) {
                $mamon = $_POST['mamon'];
                $tenmon = $_POST['tenmon'];
                $sotinchi = $_POST['sotinchi'];
                $sotietlythuyet = $_POST['sotietlythuyet'];
                $sotietthuchanh = $_POST['sotietthuchanh'];
                $result = $this->monHocModel->create($mamon,$tenmon,$sotinchi,$sotietlythuyet,$sotietthuchanh);
                echo $result;
            } else {
                return false;
            }
        }
    }

    public function update(){
        if(isset($_POST['mamon'])){
            $id = $_POST['id'];
            $mamon = $_POST['mamon'];
            $tenmon = $_POST['tenmon'];
            $sotinchi = $_POST['sotinchi'];
            $sotietlythuyet = $_POST['sotietlythuyet'];
            $sotietthuchanh = $_POST['sotietthuchanh'];
            $result = $this->monHocModel->update($id,$mamon,$tenmon,$sotinchi,$sotietlythuyet,$sotietthuchanh);
            echo $result;
        }
    }

    public function delete(){
        if(isset($_POST['mamon'])){
            $mamon = $_POST['mamon'];
            $result = $this->monHocModel->delete($mamon);
            echo $result;
        }
    }

    public function getData()
    {
        $data = $this->monHocModel->getAll();
        echo json_encode($data);
    }

    public function getDetail()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $this->monHocModel->getById($_POST['mamon']);
            echo json_encode($data);
        }
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
}
?>