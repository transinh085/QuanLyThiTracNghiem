<?php
class User extends Controller{
    public $NguoiDungModel;

    public function __construct()
    {
        $this->NguoiDungModel = $this->model("NguoiDungModel");
        parent::__construct();
    }

    public function default()
    {
        AuthCore::checkAuthentication();
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
            $id = $_POST['masinhvien'];
            $email = $_POST['email'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $password = $_POST['password'];
            $nhomquyen = $_POST['role'];
            $trangthai = $_POST['status'];
            $result = $this->NguoiDungModel->create($id,$email,$hoten,$password,$ngaysinh,$gioitinh,$nhomquyen,$trangthai);
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

    public function addExcel()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'vendor/autoload.php';
            $inputFileName = $_FILES["fileToUpload"]["tmp_name"];
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Lỗi không thể đọc file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            $data = [];
            for ($i = 2; $i <= $Totalrow; $i++) {
                $fullname = "";
                $email = "";
                $mssv = "";
                for ($j = 0; $j < $TotalCol; $j++) {
                    if($j==1) $mssv = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    if($j==2) $fullname.=$sheet->getCellByColumnAndRow($j, $i)->getValue();
                    if($j==3) $fullname.=" ".$sheet->getCellByColumnAndRow($j, $i)->getValue();
                    if($j==7) $email = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    
                }
                $data[$i]['fullname'] = $fullname;
                $data[$i]['email'] = $email;
                $data[$i]['mssv'] = $mssv;
                $data[$i]['nhomquyen'] = 1;
                $data[$i]['trangthai'] = 1;
            }
            echo json_encode($data);
        }
    }

    public function addFileExcel(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $listUser = $_POST['listuser'];
            $result = $this->NguoiDungModel->addFile($listUser);
            echo $result;
        }
    }

    public function getQuery($filter, $input) {
        $query = $this->NguoiDungModel->getQuery($filter, $input);
        return $query;
    }
}
