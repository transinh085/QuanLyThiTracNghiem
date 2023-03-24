<?php
class Client extends Controller{
    public function __construct()
    {
        
    }

    public function group()
    {
        $this->view("main_layout", [
            "Page" => "client_group",
            "Title" => "Nhóm",
            "Script" => "client_group",
            "Plugin" => [
                "jquery-validate" => 1
            ]
        ]);
    }
}
?>