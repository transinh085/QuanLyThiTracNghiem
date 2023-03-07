<?php
class ajax extends Controller {
    public $lopmodel;
    public $nhommodel;

    function __construct() {
        $this->lopmodel = $this->model("LopModel");
        $this->nhommodel = $this->model("NhomModel");
    }

    function loadDataGroup()
    {
        $arr = $this->nhommodel->getAll();
        $result = array();
        while($row = mysqli_fetch_assoc($arr)) {
            array_push($result,$row);
        }
        echo json_encode($result);
    }

    public function loadDataClass()
    {
        $arr = $this->nhommodel->getAll();
        $result = array();
        while($row = mysqli_fetch_assoc($arr)) {
            $row['class'] = array();
            $cl = $this->nhommodel->getClass($row['manhom']);
            while($row_cl = mysqli_fetch_assoc($cl)) {
                array_push($row['class'],$row_cl);
            }
            array_push($result,$row);
        }
        echo json_encode($result);
    }

    public function deleteGroup()
    {
        if(isset($_POST['id'])) {
            $this->nhommodel->delete($_POST['id']);
        }
    }
}
?>