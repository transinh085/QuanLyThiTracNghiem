<?php 
class SelectQuestion extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function default()
    {
        AuthCore::checkAuthentication();
        $this->view('main_layout',[
            "Page" => "select_question",
            "Title" => "Chọn câu hỏi"
        ]);
    }
}
?>