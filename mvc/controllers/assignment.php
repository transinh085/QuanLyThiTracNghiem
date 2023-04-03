<?php
class Assignment extends Controller
{
    public $PhanCongModel;

    function __construct()
    {
        $this->PhanCongModel = $this->model("PhanCongModel");
        parent::__construct();
    }

    function default()
    {
        AuthCore::checkAuthentication();
        $this->view("main_layout", [
            "Page" => "assignment",
            "Title" => "Phân quyền",
            "Plugin" => [
                "ckeditor" => 1,
                "select" => 1,
                "notify" => 1,
                "sweetalert2" => 1,
            ],
            "Script" => "assignment"
        ]);
    }

    function getGiangVien(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $result = $this->PhanCongModel->getGiangVien();
            echo json_encode($result);
        }
    }

    function getMonHoc(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $result = $this->PhanCongModel->getMonHoc();
            echo json_encode($result);
        }
    }

    function getAssignment(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $result = $this->PhanCongModel->getAssignment();
            echo json_encode($result);
        }
    }

    function addAssignment(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $magiangvien = $_POST['magiangvien'];
            $l_subject = $_POST['listSubject'];
            $result = $this->PhanCongModel->addAssignment($magiangvien,$l_subject);
            echo $result;
        }
    }

    function delete(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['id'];
            $mamon = $_POST['mamon'];
            $result = $this->PhanCongModel->delete($mamon,$id);
            echo $result;
        }
    }
}