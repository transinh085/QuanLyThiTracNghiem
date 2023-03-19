<?php
class Setting extends Controller{
    public function default()
    {
        $this->view('main_layout',[
            "Page" => "setting",
            "Title" => "Cài đặt"
        ]);
    }
}
?>