<?php
class Setting extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function default()
    {
        AuthCore::checkAuthentication();
        $this->view('main_layout',[
            "Page" => "setting",
            "Title" => "Cài đặt"
        ]);
    }
}
?>