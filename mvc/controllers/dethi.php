<?php
require "./mvc/core/AuthCore.php";

class Dethi extends Controller{
    public function default()
    {
        $this->view("single_layout",[
            "Page" => "de_thi",
            "Title" => "Làm bài kiểm tra",
            "Script" => "de_thi"
        ]);
    }
}
?>