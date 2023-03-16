<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

    public function checkPer($chucnang, $hanhdong)
    {
        $valid = isset($_COOKIE['token']);
        if($valid) $valid = in_array($hanhdong, $_SESSION["user_role"][$chucnang]);
        if($valid) return true;
        else return false;
    }
}
?>