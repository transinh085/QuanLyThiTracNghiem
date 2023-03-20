<?php
require_once "./mvc/core/AuthCore.php";

class Dashboard extends Controller{
    function default(){
        AuthCore::checkAuthentication();
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