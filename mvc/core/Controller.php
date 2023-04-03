<?php
require_once "./mvc/core/DB.php";

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
        $limit = 5;
        $page = 1;
        $input = null;
        $filter = null;
        $args = null;
        if (isset($_POST["args"])) {
            $args = json_decode($_POST["args"], true);
            extract($args);
        }
        $offset = ($page - 1) * $limit;
        $query = $this->getQuery($filter, $input, $args);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB = new DB();
            $result = $DB->pagination($query, $limit, $offset);
            echo json_encode($result);
            unset($DB);
        }
    }

    public function getNumberPage() {
        $limit = 5;
        $input = null;
        $filter = null;
        $args = null;
        if (isset($_POST["args"])) {
            $args = json_decode($_POST["args"], true);
            extract($args);
        }
        $query = $this->getQuery($filter, $input, $args);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB = new DB();
            $result = $DB->getNumberPage($query, $limit, $args);
            echo json_encode($result);
            unset($DB);
        }
    }
}
?>