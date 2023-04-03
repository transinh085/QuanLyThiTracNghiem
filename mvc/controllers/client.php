<?php
class Client extends Controller{

    public $nhommodel;
    public $dethimodel;
    public $nguoidungmodel;

    public function __construct()
    {
        $this->nhommodel = $this->model("NhomModel");
        $this->dethimodel = $this->model("DeThiModel");
        $this->nguoidungmodel = $this->model("NguoiDungModel");
        parent::__construct();
    }

    public function group()
    {
        AuthCore::checkAuthentication();
        $this->view("main_layout", [
            "Page" => "client_group",
            "Title" => "Nhóm",
            "Script" => "client_group",
            "Plugin" => [
                "jquery-validate" => 1,
                "notify" => 1
            ]
        ]);
    }

    public function test() {
        AuthCore::checkAuthentication();
        $this->view("main_layout", [
            "Page" => "test_schedule",
            "Title" => "Lịch kiểm tra",
            "Script" => "test_schedule",
        ]);
    }

    public function getCurrentUserInfo() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_SESSION['user_id'];
            $result = $this->nguoidungmodel->getById($user_id);
            echo json_encode($result);
        }
    }

    public function getUserTestSchedule() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_SESSION['user_id'];
            $result = $this->dethimodel->getUserTestSchedule($user_id);
            echo json_encode($result);
        }
    }

    // public function getQuery($filter, $input) {
    //     $query = $this->dethimodel->getQuery($filter, $input);
    //     return $query;
    // }

    public function joinGroup()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $mamoi = $_POST['mamoi'];
            $manguoidung = $_SESSION['user_id'];
            $result_manhom = $this->nhommodel->getIdFromInvitedCode($mamoi);
            if($result_manhom != null) {
                $manhom = $result_manhom['manhom'];
                $result = $this->nhommodel->join($manhom,$manguoidung);
                if($result) echo json_encode($this->nhommodel->getDetailGroup($manhom));
                else echo json_encode(1);
            } else echo json_encode(0);
        }
    }
    
    public function loadDataGroups() {
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $manguoidung = $_SESSION['user_id'];
            $result = $this->nhommodel->getAllGroup_User($manguoidung);
            echo json_encode($result);
        }
    }

    public function getFriendList()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $manguoidung = $_SESSION['user_id'];
            $manhom = $_POST['manhom'];
            $result = $this->nhommodel->getSvList($manhom);
            $index = -1;
            $i = 0;
            while($i <= count($result) && $index == -1) {
                if($result[$i]['id'] == $manguoidung) {
                    $index = $i;
                } else $i++;
            }
            array_splice($result, $index, 1);
            echo json_encode($result);
        }
    }
}
?>