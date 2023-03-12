<?php
class Home extends Controller{

    function default(){
        $this->view("landing", [
            "Title"=>"OnTest VN - Tạo đề thi trắc nghiệm",
            "Script"=>"landing",
        ]);
    }

}
?>