<?php
class Roles extends Controller{
    public $NhomQuyenModel;

    public function __construct()
    {
        $this->NhomQuyenModel = $this->model("NhomQuyenModel");
    }

    public function default()
    {
        $this->view("main_layout",[
            "Page" => "roles",
            "Title" => "Phân quyền",
            "Plugin" => [
                "sweetalert2" => 1,
                "notify" => 1
            ],
            "Script" => "roles"
        ]);
    }

    public function add()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $roles = $_POST['roles'];
            $result = $this->NhomQuyenModel->create($name,$roles);
            echo $result;
        }
    }

    public function getAllSl()
    {
        $result = $this->NhomQuyenModel->getAllSl();
        echo json_encode($result);
    }

    public function getDetail()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->NhomQuyenModel->getById($_POST['manhomquyen']);
            echo json_encode($result);
        }
    }

    public function update()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
        }
    }
}
?>