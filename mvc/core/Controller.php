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
        if (isset($_POST["page"])) {
            $page = $_POST["page"];
        }
        $start_from = ($page - 1) * $limit;
        if (isset($_POST["input"])) {
            $input = $_POST["input"];
        }
        if (isset($_POST["filter"])) {
            $filter = $_POST["filter"];
        }
        $query = $this->getQuery($filter, $input);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB = new DB();
            $result = $DB->pagination($query, $limit, $start_from);
            echo json_encode($result);
            unset($DB);
        }
    }

    public function getNumberPage() {
        $limit = 5;
        $input = null;
        $filter = null;
        if (isset($_POST["input"])) {
            $input = $_POST["input"];
        }
        if (isset($_POST["filter"])) {
            $filter = $_POST["filter"];
        }
        $query = $this->getQuery($filter, $input);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB = new DB();
            $result = $DB->getNumberPage($query, $limit);
            echo json_encode($result);
            unset($DB);
        }
    }
}
?>