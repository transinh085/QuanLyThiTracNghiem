<?php

use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;

class Question extends Controller
{
    public $cauHoiModel;
    public $cauTraLoiModel;

    function __construct()
    {
        $this->cauHoiModel = $this->model("CauHoiModel");
        $this->cauTraLoiModel = $this->model("CauTraLoiModel");
        parent::__construct();
    }

    function default()
    {
        if (AuthCore::checkPermission("cauhoi", "view")) {
            $this->view("main_layout", [
                "Page" => "question",
                "Title" => "Câu hỏi",
                "Plugin" => [
                    "ckeditor" => 1,
                    "select" => 1,
                    "notify" => 1,
                    "sweetalert2" => 1,
                ],
                "Script" => "question"
            ]);
        } else {
            $this->view("single_layout", [
                "Page" => "error/page_404",
                "Title" => "Lỗi !"
            ]);
        }
    }


    function edit($id)
    {
        if (AuthCore::checkPermission("cauhoi", "update")) {
            $this->view("main_layout", [
                "Page" => "add_question",
                "Title" => "Sửa câu hỏi",
                "Plugin" => [
                    "ckeditor" => 1,
                    "select" => 1
                ],
                "Script" => "add_question"
            ]);
        }
    }

    public function xulyDocx()
    {
        if (AuthCore::checkPermission("cauhoi", "create")) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once 'vendor/autoload.php';
                $filename = $_FILES["fileToUpload"]["tmp_name"];
                $objReader = WordIOFactory::createReader('Word2007');
                $phpWord = $objReader->load($filename);
                $text = '';
                // Lấy kí tự từng đoạn
                function getWordText($element)
                {
                    $result = '';
                    if ($element instanceof AbstractContainer) {
                        foreach ($element->getElements() as $element) {
                            $result .= getWordText($element);
                        }
                    } elseif ($element instanceof Text) {
                        $result .= $element->getText();
                    }
                    return $result;
                }

                foreach ($phpWord->getSections() as $section) {
                    foreach ($section->getElements() as $element) {
                        $text .= trim(getWordText($element));
                        $text .= "\\n";
                    }
                }

                $text = rtrim($text, "\\n");
                substr($text, -1);
                $questions = explode("\\n\\n", $text);
                $arrques = array();
                for ($i = 0; $i < count($questions); $i++) {
                    $data = explode("\\n", $questions[$i]);
                    $arrques[$i]['level'] = substr($data[0], 1, 1);
                    $arrques[$i]['question'] = substr(trim($data[0]), 4);
                    $arrques[$i]['answer'] = ord(trim(substr($data[count($data) - 1], 8))) - 65 + 1;
                    $arrques[$i]['option'] = array();
                    for ($j = 1; $j < count($data) - 1; $j++) {
                        $arrques[$i]['option'][] = trim(substr($data[$j], 3));
                    }
                }
                echo json_encode($arrques);
            }
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
                //----Lặp cột
                for ($j = 0; $j < $TotalCol; $j++) {
                    // Tiến hành lấy giá trị của từng ô đổ vào mảng
                    $check = '';
                    if($j == 0){
                        $check = "level";
                        $data[$i - 2][$check] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    } else if($j == 1){
                        $check = "question";
                        $data[$i - 2][$check] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    } else if($j == $TotalCol-1){
                        $check = "answer";
                        $data[$i - 2][$check] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    } else {
                        $check = "option";
                        $data[$i - 2][$check][] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }
                }
            }
            echo json_encode($data);
        }
    }

    public function addQues()
    {
        if (AuthCore::checkPermission("cauhoi", "create")) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $mamon = $_POST['mamon'];
                $machuong = $_POST['machuong'];
                $dokho = $_POST['dokho'];
                $noidung = $_POST['noidung'];
                $cautraloi = $_POST['cautraloi'];
                $nguoitao = $_SESSION['user_id'];
                $result = $this->cauHoiModel->create($noidung, $dokho, $mamon, $machuong, $nguoitao);
                $macauhoi = mysqli_insert_id($result);
                $check = '';
                foreach ($cautraloi as $x) {
                    $this->cauTraLoiModel->create($macauhoi, $x['content'], $x['check'] == 'true' ? 1 : 0);
                }
                echo $check;
            }
        }
    }

    public function addQuesFile()
    {
        if (AuthCore::checkPermission("cauhoi", "create")) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nguoitao = $_SESSION['user_id'];
                $monhoc = $_POST['monhoc'];
                $chuong = $_POST['chuong'];
                $questions = $_POST["questions"];
                foreach ($questions as $question) {
                    $level = $question['level'];
                    $noidung = $question['question'];
                    $answer = $question['answer'];
                    $options = $question['option'];
                    $result = $this->cauHoiModel->create($noidung, $level, $monhoc, $chuong, $nguoitao);
                    $macauhoi = mysqli_insert_id($result);
                    $index = 1;
                    foreach ($options as $option) {
                        $check = 0;
                        if ($index == $answer) {
                            $check = 1;
                        }
                        $this->cauTraLoiModel->create($macauhoi, $option, $check);
                        $index++;
                    }
                }
            }
        }
    }


    public function getQuestion()
    {
        if (AuthCore::checkPermission("cauhoi", "view")) {
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $result = $this->cauHoiModel->getAll();
                echo json_encode($result);    
            }
        }
    }

    public function delete()
    {
        if (AuthCore::checkPermission("cauhoi", "delete")) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['macauhoi'];
                $this->cauTraLoiModel->deletebyanswer($id);
                $this->cauHoiModel->delete($id);
            }
        }
    }

    public function getQuestionById()
    {
        if (AuthCore::checkPermission("cauhoi", "view")) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $result = $this->cauHoiModel->getById($id);
                echo json_encode($result);
            }
        }
    }

    public function getAnswerById()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $result = $this->cauTraLoiModel->getAll($id);
            echo json_encode($result);
        }
    }

    public function editQuesion()
    {
        if (AuthCore::checkPermission("cauhoi", "update")) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $this->cauTraLoiModel->deletebyanswer($id);
                $mamon = $_POST['mamon'];
                $machuong = $_POST['machuong'];
                $dokho = $_POST['dokho'];
                $noidung = $_POST['noidung'];
                $cautraloi = $_POST['cautraloi'];
                $nguoitao = $_SESSION['user_id'];
                $result = $this->cauHoiModel->update($id, $noidung, $dokho, $mamon, $machuong, $nguoitao);
                $macauhoi = $id;
                foreach ($cautraloi as $x) {
                    $this->cauTraLoiModel->create($macauhoi, $x['content'], $x['check'] == 'true' ? 1 : 0);
                }
            }
        }
    }

    public function getTotalPage()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = $_POST['content'];
            $select = $_POST['selected'];
            echo $this->cauHoiModel->getTotalPage($content);
        }
    }

    public function getQuestionBySubject()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mamonhoc = $_POST['mamonhoc'];
            $machuong = $_POST['machuong'];
            $dokho = $_POST['dokho'];
            $content = $_POST['content'];
            $result = $this->cauHoiModel->getQuestionBySubject($mamonhoc, $machuong, $dokho, $content);
            echo json_encode($result);
        }
    }
}
