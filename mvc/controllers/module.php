<?php
    class Module extends Controller {
        public $nhomModel;

        function __construct() {
            $this->nhomModel = $this->model("NhomModel");
        }

        public function default()
        {
            $this->view("main_layout", [
                "Page" => "module",
                "Title" => "Quản lý nhóm học phần",
                "Script" => "module",
                "Plugin" => [
                    "sweetalert2" => 1
                ]
            ]);
        }

        public function detail($id)
        {
            $this->view("main_layout", [
                "Page" => "class_detail",
                "Title" => "Quản lý lớp học",
                "Plugin" => [
                    "datepicker" => 1,
                    "flatpickr" => 1
                ],
                "Script" => "class_detail"
            ]);
        }

        public function loadData()
        {
            $result = $this->nhomModel->getBySubject();
            echo json_encode($result);
        }

    }
?>