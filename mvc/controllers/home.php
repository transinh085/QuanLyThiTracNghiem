<?php
class Home extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    function default(){
        AuthCore::checkAuthentication();
        $this->view("landing", [
            "Title"=>"OnTest VN - Tạo đề thi trắc nghiệm",
            "Script"=>"landing",
        ]);
    }

}
?>