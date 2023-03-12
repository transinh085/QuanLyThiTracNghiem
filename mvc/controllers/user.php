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
                "sweetalert2" => 1
            ]
        ]);
    }

    public function add()
    {
            $result = $this->NguoiDungModel->create($_POST['email'],$_POST['hoten'],$_POST['ngaysinh'], $_POST['gioitinh'],$_POST['role']);
            echo $result;
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
        if(isset($_POST['email'])){
            // $id = $_POST['id'];
            $email = $_POST['email'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $result = $this->NguoiDungModel->update($email,$hoten,$gioitinh,$ngaysinh);
        }
    }

}
?>