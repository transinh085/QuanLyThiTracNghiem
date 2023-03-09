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
                "sweetalert2" => 1
            ]
        ]);
    }

    public function add()
    {
            $result = $this->monHocModel->create($_POST['mamon'],$_POST['tenmon']);
            echo $result;
    }

    public function getData()
    {
        $data = $this->monHocModel->getAll();
        echo json_encode($data);
    }

    public function deleteData(){
        if(isset($_POST['mamon'])){
            $mamon = $_POST['mamon'];
            $result = $this->monHocModel->delete($mamon);
        }
    }

    public function update(){
        if(isset($_POST['mamon'])){
            $mamon = $_POST['mamon'];
            $tenmon = $_POST['tenmon'];
            $result = $this->monHocModel->update($mamon,$tenmon);
        }
    }

    //Chapper

    public function getAllChapper(){
        $result = $this->chuongModel->getAll($_POST['mamonhoc']);
        echo json_encode($result);
    }

    public function chaperDelete(){
        $this->chuongModel->delete($_POST['dataid']);
    }

    public function addChaper(){
        $this->chuongModel->insert($_POST['mamonhoc'],$_POST['tenchuong']);
    }

    public function updateChaper()
    {
        $this->chuongModel->update($_POST['machuong'], $_POST['tenchuong']);
    }
}

?>