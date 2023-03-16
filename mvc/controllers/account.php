<?php
class Account extends Controller{
    function default() {
        $this->view("main_layout",[
            "Page" => "account_setting",
            "Title" => "Trang cá nhân"
        ]);
    }

    public function check()
    {
        echo "<pre>";
        print_r($_SESSION);
    }

    public function checkrole()
    {
        $nguoidung  = $this->model("NguoiDungModel");
        echo json_encode($nguoidung->getRole($_SESSION['user_id']));
    }
}

?>