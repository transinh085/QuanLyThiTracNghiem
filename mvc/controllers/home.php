<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    function default(){
        $this->view("landing", [
            "Title"=>"OnTest VN - Tạo đề thi trắc nghiệm",
        ]);
    }

}
?>