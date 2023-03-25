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
            "Page" => "add_update_test",
            "Title" => "Tạo đề kiểm tra",
            "Plugin" => [
                "datepicker" => 1,
                "flatpickr" => 1,
                "select" => 1,
                "notify" => 1
            ],
            "Script" => "action_test",
            "Action" => "create"
        ]);
    }

    public function update($made)
    {
        $this->view("main_layout", [
            "Page" => "add_update_test",
            "Title" => "Cập nhật đề kiểm tra",
            "Plugin" => [
                "datepicker" => 1,
                "flatpickr" => 1,
                "select" => 1,
                "notify" => 1
            ],
            "Script" => "action_test",
            "Action" => "update"
        ]);
    }

    public function start($made)
    {
        $this->view("main_layout",[
            "Page" => "vao_thi",
            "Title" => "Bắt đầu thi",
            "Test" => $this->dethimodel->getById($made)
        ]);
    }

    public function detail($made)
    {
        $this->view("main_layout",[
            "Page" => "test_detail",
            "Title" => "Danh sách đã thi"
        ]);
    }

    public function select($made)
    {
        $this->view('main_layout',[
            "Page" => "select_question",
            "Title" => "Chọn câu hỏi"
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

    public function updateTest()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $made = $_POST['made'];
            $mamonhoc = $_POST['mamonhoc'];
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
            $result = $this->dethimodel->update($made,$mamonhoc,$tende,$thoigianthi,$thoigianbatdau,$thoigianketthuc,$xembailam,$xemdiem,$xemdapan,$daocauhoi,$daodapan, $tudongnop,$loaide,$socaude,$socautb,$socaukho,$chuong,$manhom);
            echo $result;
        }
    }

    public function getData()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_SESSION['user_id'];
            $result = $this->dethimodel->getAll($user_id);
            echo json_encode($result);
        }
    }

    public function getDetail()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $made = $_POST['made'];
            $result = $this->dethimodel->getById($made);
            echo json_encode($result);
        }
    }

    public function getTestGroup()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $manhom = $_POST['manhom'];
            $result = $this->dethimodel->getListTestGroup($manhom);
            echo json_encode($result);
        }
    }
}

?>