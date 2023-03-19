<?php
require_once "./mvc/core/Auth.php";

class Dashboard extends Controller{
    function default(){
        Auth::checkAuthentication();
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