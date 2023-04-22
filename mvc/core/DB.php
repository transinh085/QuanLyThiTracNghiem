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

    public function pagination($query, $limit, $start_from)
    {
        $sql = "$query LIMIT $start_from, $limit";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function getNumberPage($query, $limit)
    {
        $page_result = mysqli_query($this->con, $query);
        $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil($total_records / $limit);
        return $total_pages;
    }
}
?>