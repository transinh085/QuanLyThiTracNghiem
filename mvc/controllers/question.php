<?php
use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;

    class Question extends Controller{
        public $cauHoiModel;
        public $cauTraLoiModel;

        function __construct(){
            $this->cauHoiModel = $this->model("CauHoiModel");
            $this->cauTraLoiModel = $this->model("CauTraLoiModel");
        }

        function default() {
            $this->view("main_layout", [
                "Page" => "question",
                "Title" => "Câu hỏi",
                "Plugin" => [
                    "ckeditor" => 1,
                    "select" => 1
                ],
                "Script" => "question"
            ]);
        }


        function edit($id) {
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

        public function xulyDocx()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once 'vendor/autoload.php';
                $filename = $_FILES["fileToUpload"]["tmp_name"];
                $objReader = WordIOFactory::createReader('Word2007');
                $phpWord = $objReader->load($filename);
                $text = '';
                // Lấy kí tự từng đoạn
                function getWordText($element) {
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
                substr($text,-1);
                $questions = explode("\\n\\n",$text);
                $arrques = array();
                for($i = 0; $i < count($questions); $i++) {
                    $data = explode("\\n", $questions[$i]);
                    $arrques[$i]['question'] = trim($data[0]);
                    $arrques[$i]['answer'] = ord(trim(substr($data[count($data) - 1],8))) - 65 + 1;
                    $arrques[$i]['option'] = array();
                    for($j = 1; $j < count($data) - 1; $j++) {
                        $arrques[$i]['option'][] = trim(substr($data[$j],3));
                    }
                }
                echo json_encode($arrques);
            }
        }

        public function addQues()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $mamon = $_POST['mamon'];
                $machuong = $_POST['machuong'];
                $dokho = $_POST['dokho'];
                $noidung = $_POST['noidung'];
                $cautraloi = $_POST['cautraloi'];
                $nguoitao = "ok";
                $result = $this->cauHoiModel->create($noidung,$dokho,$mamon,$machuong,$nguoitao);
                $macauhoi = mysqli_insert_id($result);
                foreach($cautraloi as $x) {
                    $this->cauTraLoiModel->create($macauhoi,$x['content'],$x['check'] == true ? 1 : 0);
                }
            }
        }
    }
?>