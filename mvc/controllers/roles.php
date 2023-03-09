<?php
class Roles extends Controller{

    public function default()
    {
        $this->view("main_layout",[
            "Page" => "roles",
            "Title" => "Phân quyền",
            "Plugin" => [
                "sweetalert2" => 1
            ],
            "Script" => "roles"
        ]);
    }

    public function add()
    {
        $this->view("main_layout",[
            "Page" => "add_role",
            "Title" => "Tạo quyền",
        ]);
    }

    public function addRole()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<pre>";
            print_r($_POST);
        }
    }
}

?>