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
    
    public function pagination() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST["args"])) {
                $args = json_decode($_POST["args"], true);
            }
            $pagination = new Pagination($args["model"]);
            $pagination->getData($args);
            unset($pagination);
        }
    }

    public function getTotalPages() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST["args"])) {
                $args = json_decode($_POST["args"], true);
            }
            $pagination = new Pagination($args["model"]);
            $pagination->getTotal($args);
            unset($pagination);
        }
    }
}
?>