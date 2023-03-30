<div class="content row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-12 bg-white p-4 rounded">
        <h4 class="text-center"><?php echo $data["Test"]["tende"]?></h4>
        <div class="exam-info mb-3">
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-clock me-2"></i></span><span> Thời gian làm bài</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo $data["Test"]["thoigianthi"]?> phút</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-calendar-days me-2"></i></span><span> Thời gian mở đề</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo date_format(date_create($data["Test"]["thoigianbatdau"]),"H:i d/m/Y")?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-calendar-xmark me-2"></i></span><span> Thời gian kết thúc</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo date_format(date_create($data["Test"]["thoigianketthuc"]),"H:i d/m/Y")?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-circle-question me-2"></i></span><span> Số lượng câu hỏi</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo $data["Test"]["socaude"] + $data["Test"]["socautb"] + $data["Test"]["socaukho"]?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-file-lines me-2"></i></span><span> Môn học</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo $data["Test"]["tenmonhoc"]?></span>
                </div>
            </div>
        </div>
        <?php 
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $now = new DateTime();
            $start = new DateTime($data["Test"]["thoigianbatdau"]);
            $end = new DateTime($data["Test"]["thoigianketthuc"]);
            if($end < $now) echo "<button class='btn btn-hero btn-danger w-100' role='button'>Đã quá thời gian làm bài</button>";
            else if($start > $now) echo "<button class='btn btn-hero btn-light w-100' role='button'>Chưa tới thời gian mở đề</button>";
            else echo "<button name='start-test' id='start-test' class='btn btn-hero btn-info w-100' role='button'>Bắt đầu thi <i class='fa fa-angle-right'></i></button>";
        ?>
    </div>
</div>