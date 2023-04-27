<?php
class Home extends Controller{

    function default(){
        $this->view("landing", [
            "Title"=>"SGU Test - Hệ thống thi trực tuyến",
            "Script"=>"landing",
            "Plugin" => [
                "jq-appear" => 1
            ]
        ]);
    }

}
?>