<?php
class Account extends Controller{
    function default() {
        $this->view("main_layout",[
            "Page" => "account_setting",
            "Title" => "Trang cá nhân"
        ]);
    }
}

?>