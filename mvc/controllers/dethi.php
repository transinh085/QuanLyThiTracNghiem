<?php

class Dethi extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function default()
    {
        
        $this->view("single_layout",[
            "Page" => "de_thi",
            "Title" => "Làm bài kiểm tra",
            "Made" => 7,
            "Script" => "de_thi"
        ]);
    }
}
?>