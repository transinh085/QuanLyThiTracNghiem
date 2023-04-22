<?php

class Dashboard extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

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