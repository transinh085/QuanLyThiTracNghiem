<?php
class Assignment extends Controller
{
    public $PhanCongModel;

    function __construct()
    {
        $this->PhanCongModel = $this->model("PhanCongModel");
    }

    function default()
    {

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
}