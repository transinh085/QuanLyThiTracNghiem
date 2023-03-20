<?php
class Myerror extends Controller{


    public function default()
    {
        $this->view("single_layout", [
            "Page" => "error/page_404",
            "Title" => "Lỗi !"
        ]);
    }
}
?>