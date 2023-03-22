<?php
class Controller{
    public function __construct()
    {
        require_once "./mvc/core/AuthCore.php";
    }

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

}
?>