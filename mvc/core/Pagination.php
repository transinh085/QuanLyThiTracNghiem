<?php
class Pagination extends Controller {
    public $paginationModel;
    public $queryModel;

    public function __construct($model) {
        $this->paginationModel = $this->model("PaginationModel");
        $this->queryModel = $this->model($model);
    }

    public function getData($args) {
        $limit = 5;
        $page = 1;
        $input = null;
        $filter = null;
        extract($args);
        $offset = ($page - 1) * $limit;
        $query = $this->queryModel->getQuery($filter, $input, $args);
        $result = $this->paginationModel->pagination($query, $limit, $offset);
        echo json_encode($result);
    }

    public function getTotal($args) {
        $limit = 5;
        $input = null;
        $filter = null;
        extract($args);
        $query = $this->queryModel->getQuery($filter, $input, $args);
        $result = $this->paginationModel->getTotalPages($query, $limit, $args);
        echo $result;
    }
}
?>