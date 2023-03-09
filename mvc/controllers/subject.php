<?php
class Subject extends Controller{
    public $monHocModel;

    public function __construct()
    {
        $this->monHocModel = $this->model("MonHocModel");
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
        $valid = true;
        if(isset($_POST['mamon']) && isset($_POST['tenmon'])) {
            $result = $this->monHocModel->create($_POST['mamon'],$_POST['tenmon']);
            if(!$result) $valid = false;
        }
        echo json_encode($valid);
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
}

?>