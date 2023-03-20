<?php
class Myerror extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function default()
    {
        $this->view("single_layout", [
            "Page" => "error/page_404",
            "Title" => "Lỗi !"
        ]);
    }
}
?>