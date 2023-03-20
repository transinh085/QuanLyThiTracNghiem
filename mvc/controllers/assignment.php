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
            "Page" => "question",
            "Title" => "Phân quyền",
            "Plugin" => [
                "ckeditor" => 1,
                "select" => 1,
                "notify" => 1,
                "sweetalert2" => 1,
            ],
            "Script" => "question"
        ]);
    }
}