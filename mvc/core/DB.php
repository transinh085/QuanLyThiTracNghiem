<?php

class DB{
    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "tracnghiemonline";

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}

// class DB{
//     public $con;
//     protected $servername = "103.142.24.50";
//     protected $username = "iamrobot_quanlitracnghiemonline";
//     protected $password = "123456";
//     protected $dbname = "iamrobot_quanlitracnghiemonline";

//     function __construct(){
//         $this->con = mysqli_connect($this->servername, $this->username, $this->password);
//         mysqli_select_db($this->con, $this->dbname);
//         mysqli_query($this->con, "SET NAMES 'utf8'");
//     }
// }

?>