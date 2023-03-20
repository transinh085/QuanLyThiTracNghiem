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
            $id = $_POST['id'];
            $email = $_POST['email'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $password = $_POST['password'];
            $nhomquyen = $_POST['role'];
            $trangthai = $_POST['status'];
            $result = $this->NguoiDungModel->update($id,$email,$hoten,$password,$ngaysinh,$gioitinh,$nhomquyen,$trangthai);
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

    // 30 người total_rows = 30
    // mỗi trang chứa 5 người limit = 5
    // 30 / 5 => total_rows / limit
    // $start_from = ($page - 1)*$record_per_page;
    // $query = "SELECT * from nguoidung ORDER BY id DESC LIMIT $start_from, $record_per_page";
    // $result = mysqli_query($this->con, $query);
    // -------
    // $page_query = "SELECT * FROM nguoidung ORDER BY id DESC";
    // $page_result = mysqli_query($this->con, $page_query);
    // $total_records = mysqli_num_rows($page_result);
    // $total_pages = ceil($total_records/$record_per_page);
    // --------------------
    // public function pagination() {
    //     $limit = self::limit;
    //     $page = 1;
    //     // $start_from = ($page - 1)*$limit;
    //     // $query = "SELECT * from nguoidung ORDER BY id DESC LIMIT $start_from, $limit";
    //     // $rows = mysqli_query($this->con, $query);
    //     // $total_rows = count($rows);
    //     $page_query = "SELECT * FROM nguoidung ORDER BY id DESC";
    //     $page_result = mysqli_query($this->con, $page_query);
    //     $total_rows = mysqli_num_rows($page_result);
    //     $total_page = ceil($total_rows / $limit);
    //     $start = ($page - 1)*$limit;
    //     if ($total_rows > 0) {
    //         $datas = "SELECT * from nguoidung ORDER BY id DESC LIMIT $start, $limit";
    //     }
    //     $button_pagination = $this->NguoiDungModel->pagination($total_page, $page);
    // }

    public function pagination() {
        $limit = 5;
        $page = 0;
        if (isset($_POST["page"])) {
            $page = $_POST["page"];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1)*$limit;
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->NguoiDungModel->pagination($limit, $start_from);
            echo json_encode($result);
        }
    }

    public function getNumberPage() {
        $limit = 5;
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->NguoiDungModel->getNumberPage($limit);
            echo json_encode($result);
            // echo $result;
        }
    }

    

}
?>