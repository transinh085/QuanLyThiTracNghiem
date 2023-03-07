<?php
class User extends Controller{
    public function default()
    {
        $this->view("main_layout",[
            "Page" => "user",
            "Title" => "Quản lý người dùng"
        ]);
    }

}
?>