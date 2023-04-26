<?php
require_once 'vendor/autoload.php';
require_once 'vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
class Module extends Controller
{
    public $nhomModel;

    function __construct()
    {
        $this->nhomModel = $this->model("NhomModel");
        parent::__construct();
    }

    public function default()
    {
        AuthCore::checkAuthentication();
        if (AuthCore::checkPermission("hocphan", "view")) {
            $this->view("main_layout", [
                "Page" => "module",
                "Title" => "Quản lý nhóm học phần",
                "Script" => "module",
                "Plugin" => [
                    "sweetalert2" => 1,
                    "select" => 1,
                    "jquery-validate" => 1,
                    "notify" => 1
                ]
            ]);
        } else
            $this->view("single_layout", ["Page" => "error/page_403", "Title" => "Lỗi !"]);
    }

    public function detail($manhom)
    {
        AuthCore::checkAuthentication();
        if (AuthCore::checkPermission("hocphan", "view")) {
            $this->view("main_layout", [
                "Page" => "class_detail",
                "Title" => "Quản lý nhóm",
                "Plugin" => [
                    "datepicker" => 1,
                    "flatpickr" => 1,
                    "sweetalert2" => 1,
                    "notify" => 1,
                ],
                "Script" => "class_detail",
                "Detail" => $this->nhomModel->getDetailGroup($manhom)
            ]);
        } else
            $this->view("single_layout", ["Page" => "error/page_403", "Title" => "Lỗi !"]);
    }

    public function loadData()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && AuthCore::checkPermission("hocphan", "create")) {
            $hienthi = $_POST['hienthi'];
            $user_id = $_SESSION['user_id'];
            $result = $this->nhomModel->getBySubject($user_id, $hienthi);
            echo json_encode($result);
        } else
            echo json_encode(false);
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && AuthCore::checkPermission("hocphan", "create")) {
            $tennhom = $_POST['tennhom'];
            $ghichu = $_POST['ghichu'];
            $monhoc = $_POST['monhoc'];
            $namhoc = $_POST['namhoc'];
            $hocky = $_POST['hocky'];
            $giangvien = $_SESSION['user_id'];
            $result = $this->nhomModel->create($tennhom, $ghichu, $namhoc, $hocky, $giangvien, $monhoc);
            echo $result;
        } else
            echo json_encode(false);
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && AuthCore::checkPermission("hocphan", "delete")) {
            $manhom = $_POST['manhom'];
            $result = $this->nhomModel->delete($manhom);
            echo $result;
        } else
            echo json_encode(false);
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && AuthCore::checkPermission("hocphan", "update")) {
            $manhom = $_POST['manhom'];
            $tennhom = $_POST['tennhom'];
            $ghichu = $_POST['ghichu'];
            $monhoc = $_POST['monhoc'];
            $namhoc = $_POST['namhoc'];
            $hocky = $_POST['hocky'];
            $result = $this->nhomModel->update($manhom, $tennhom, $ghichu, $namhoc, $hocky, $monhoc);
            echo json_encode($result);
        } else
            echo json_encode(false);
    }

    public function hide()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && AuthCore::checkPermission("hocphan", "create")) {
            $manhom = $_POST['manhom'];
            $giatri = $_POST['giatri'];
            $result = $this->nhomModel->hide($manhom, $giatri);
            echo $result;
        } else
            echo json_encode(false);
    }

    public function getDetail()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && AuthCore::checkPermission("hocphan", "create")) {
            $manhom = $_POST['manhom'];
            $result = $this->nhomModel->getById($manhom);
            echo json_encode($result);
        } else
            echo json_encode(false);
    }


    public function updateInvitedCode()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $manhom = $_POST['manhom'];
            $result = $this->nhomModel->updateInvitedCode($manhom);
            echo $result;
        }
    }

    public function getInvitedCode()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $manhom = $_POST['manhom'];
            $result = $this->nhomModel->getInvitedCode($manhom);
            echo $result['mamoi'];
        }
    }

    public function getSvList() 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $manhom = $_POST['manhom'];
            $result = $this->nhomModel->getSvList($manhom);
            echo json_encode($result);
        }
    }


    public function addSV()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $manhom = $_POST['manhom'];
            $mssv = $_POST['mssv'];
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $ngaysinh = $_POST['ngaysinh'];
            $bd = date("Y-m-d", strtotime($ngaysinh));
            $password = $_POST['password'];
            $gioitinh = $_POST['gioitinh'];
            $result = $this->nhomModel->addSV($mssv,$hoten,$sdt,$email,$bd,$password,$gioitinh);
            $joinGroup = $this->nhomModel->join($manhom,$mssv);
            echo json_encode($result);
        }
    }

    public function exportExcelStudentS()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $manhom = $_POST['manhom'];
            $result = $this->nhomModel->getStudentByGroup($manhom);
            //Khởi tạo đối tượng
            $excel = new PHPExcel();
            //Chọn trang cần ghi (là số từ 0->n)
            $excel->setActiveSheetIndex(0);
            //Tạo tiêu đề cho trang. (có thể không cần)
            $excel->getActiveSheet()->setTitle("Danh sách kết quả");

            //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);


            //Xét in đậm cho khoảng cột
            $phpColor = new PHPExcel_Style_Color();
            $phpColor->setRGB('FFFFFF');
            $excel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle('A1:F1')->getFont()->setColor($phpColor);
            $excel->getActiveSheet()->getStyle('A1:F1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '33FF33')
                    )
                )
            );
            $excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->applyFromArray(
                array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            ;
            //Tạo tiêu đề cho từng cột
//Vị trí có dạng như sau:
            /**
             * |A1|B1|C1|..|n1|
             * |A2|B2|C2|..|n1|
             * |..|..|..|..|..|
             * |An|Bn|Cn|..|nn|
             */
            $excel->getActiveSheet()->setCellValue('A1', 'MSSV');
            $excel->getActiveSheet()->setCellValue('B1', 'Họ và tên');
            $excel->getActiveSheet()->setCellValue('C1', 'Email');
            $excel->getActiveSheet()->setCellValue('D1', 'Ngày tham gia');
            $excel->getActiveSheet()->setCellValue('E1', 'Ngày Sinh');
            $excel->getActiveSheet()->setCellValue('F1', 'Giới tính');
            // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
            // dòng bắt đầu = 2
            $numRow = 2;
            foreach ($result as $row) {
                $excel->getActiveSheet()->setCellValue('A' . $numRow, $row["id"]);
                $excel->getActiveSheet()->setCellValue('B' . $numRow, $row["hoten"]);
                $excel->getActiveSheet()->setCellValue('C' . $numRow, $row["email"]);
                $excel->getActiveSheet()->setCellValue('D' . $numRow, $row["ngaythamgia"]);
                $excel->getActiveSheet()->setCellValue('E' . $numRow, $row["ngaysinh"]);
                if ($row["gioitinh"] == 0) {
                    $excel->getActiveSheet()->setCellValue('F' . $numRow, "Nữ");
                } else if ($row["gioitinh"] == 1) {
                    $excel->getActiveSheet()->setCellValue('F' . $numRow, "Nam");
                } else {
                    $excel->getActiveSheet()->setCellValue('F' . $numRow, "Null");
                }

                $excel->getActiveSheet()->getStyle("A" . $numRow . ":F" . "$numRow")->getAlignment()->applyFromArray(
                    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    )
                );
                ;
                $numRow++;
            }
            ob_start();
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
            $xlsData = ob_get_contents();
            ob_end_clean();
            $response = array(
                'status' => TRUE,
                'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData)
            );

            die(json_encode($response));
        }
    }
}

?>
