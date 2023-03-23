<?php
class Test extends Controller{

    public $dethimodel;

    public function __construct()
    {
        $this->dethimodel = $this->model("DeThiModel");
    }

    public function default()
    {
        $this->view("main_layout", [
            "Page" => "test",
            "Title" => "Đề kiểm tra",
            "Plugin" => [
                "notify" => 1
            ],
            "Script" => "test"
        ]);
    }

    public function add()
    {
        $this->view("main_layout", [
            "Page" => "add_test",
            "Title" => "Tạo đề kiểm tra",
            "Plugin" => [
                "datepicker" => 1,
                "flatpickr" => 1,
                "select" => 1,
                "notify" => 1
            ],
            "Script" => "add_test"
        ]);
    }

    public function vaothi()
    {
        $this->view("main_layout",[
            "Page" => "vao_thi",
            "Title" => "Bắt đầu thi"
        ]);
    }

    public function detail($made)
    {
        $this->view("main_layout",[
            "Page" => "exam_detail",
            "Title" => "Danh sách đã thi"
        ]);
    }

    public function addTest()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $mamonhoc = $_POST['mamonhoc'];
            $nguoitao = $_SESSION['user_id'];
            $tende = $_POST['tende'];
            $thoigianthi = $_POST['thoigianthi'];
            $thoigianbatdau = $_POST['thoigianbatdau'];
            $thoigianketthuc = $_POST['thoigianketthuc'];
            $socaude = $_POST['socaude'];
            $socautb = $_POST['socautb'];
            $socaukho = $_POST['socaukho'];
            $chuong = $_POST['chuong'];
            $loaide = $_POST['loaide'];
            $xemdiem = $_POST['xemdiem'];
            $xemdapan = $_POST['xemdapan'];
            $xembailam = $_POST['xembailam'];
            $daocauhoi = $_POST['daocauhoi'];
            $daodapan = $_POST['daodapan'];
            $tudongnop = $_POST['tudongnop'];
            $manhom = $_POST['manhom'];
            $result = $this->dethimodel->create($mamonhoc,$nguoitao,$tende,$thoigianthi,$thoigianbatdau,$thoigianketthuc,$xembailam,$xemdiem,$xemdapan,$daocauhoi,$daodapan, $tudongnop,$loaide,$socaude,$socautb,$socaukho,$chuong,$manhom);
            echo $result;
        }
    }

    public function getData()
    {
        $result = $this->dethimodel->getAll();
        echo json_encode($result);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        }
    }
}

?>