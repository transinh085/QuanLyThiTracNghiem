<?php
class App{

    protected $controller="home";
    protected $action="default";
    protected $params=[];

    function __construct(){

        $arr = $this->UrlProcess();
        // Controller
        if($arr != NULL) {
            if(file_exists("./mvc/controllers/".$arr[0].".php") ){
                $this->controller = $arr[0];
                unset($arr[0]);
            } else {
                $this->controller = 'myerror';
            }
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if(method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            } else {
                // Hien thi trang loi
                $this->controller = 'myerror';
                require_once "./mvc/controllers/". $this->controller .".php";
                $this->controller = new $this->controller;
            }
            unset($arr[1]);
        }
        // Params
        $this->params = $arr?array_values($arr):[];
        try {
            call_user_func_array([$this->controller, $this->action], $this->params );
        } catch (ArgumentCountError $e) {
            $this->controller = 'myerror';
            require_once "./mvc/controllers/". $this->controller .".php";
            $this->controller = new $this->controller;
            $this->action = 'default';
            call_user_func_array([$this->controller, $this->action], []);
        }

    }

    function UrlProcess(){
        if(isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>