<?php
class User extends Controller{
    public $NguoiDungModel;

    public function __construct()
    {
        $this->NguoiDungModel = $this->model("NguoiDungModel");
    }

    public function default()
    {
        $this->view("main_layout",[
            "Page" => "user",
            "Title" => "Quản lý người dùng",
            "Script" => "user",
            "Plugin" => [
                "sweetalert2" => 1,
                "datepicker" => 1,
                "flatpickr" => 1,
                "select" => 1,
            ]
        ]);
    }

    public function add()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $password = $_POST['password'];
            $nhomquyen = $_POST['role'];
            $trangthai = $_POST['status'];
            $result = $this->NguoiDungModel->create($email,$hoten,$password,$ngaysinh,$gioitinh,$nhomquyen,$trangthai);
            echo $result;
        }
    }

    public function getData()
    {
        $data = $this->NguoiDungModel->getAll();
        echo json_encode($data);
    }

    public function deleteData(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $result = $this->NguoiDungModel->delete($id);
        }
    }

    public function update(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $password = $_POST['password'];
            $nhomquyen = $_POST['role'];
            $trangthai = $_POST['status'];
            $result = $this->NguoiDungModel->create($email,$hoten,$password,$ngaysinh,$gioitinh,$nhomquyen,$trangthai);
            echo $result;
        }
    }

    public function getDetail()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->NguoiDungModel->getById($_POST['id']);
            echo json_encode($result);
        }
    }

}
?>