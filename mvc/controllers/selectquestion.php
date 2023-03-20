<?php 
class SelectQuestion extends Controller{
    public function default()
    {
        $this->view('main_layout',[
            "Page" => "select_question",
            "Title" => "Chọn câu hỏi"
        ]);
    }
}
?>