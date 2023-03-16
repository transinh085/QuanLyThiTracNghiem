<?php
class Dashboard extends Controller{
    function default(){
        $this->view("main_layout", [
            "Page" => "dashboard" ,
            "Title" => "Trang tổng quan",
            "Plugin" => [
                "chart" => 1
            ],
            "Script" => "dashboard"
        ]);
    }
}
?>