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
                    <span class="text-primary"><i class="far fa-calendar-days me-2"></i></span><span> Thời gian mở
                        đề</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo date_format(date_create($data["Test"]["thoigianbatdau"]),"H:i d/m/Y")?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-calendar-xmark me-2"></i></span><span> Thời gian kết
                        thúc</span>
                </div>
                <div class="col-6 text-end">
                    <span><?php echo date_format(date_create($data["Test"]["thoigianketthuc"]),"H:i d/m/Y")?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <span class="text-primary"><i class="far fa-circle-question me-2"></i></span><span> Số lượng câu
                        hỏi</span>
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
            if(isset($data["Check"]['diemthi']) && $data["Check"]['diemthi'] != ''){
                echo "<button class='btn btn-hero btn-danger w-100' role='button'>Bạn đã hoàn thành bài thi</button>";
            } else if(isset($data["Check"]['makq']) && $data["Check"]['diemthi'] == ''){
                echo "<a class='btn btn-hero btn-info w-100' href='./test/taketest/".$data['Test']['made']."'>Tiếp tục thi <i class='fa fa-angle-right'></i></a>";
            } else {
                if($end < $now) echo "<button class='btn btn-hero btn-danger w-100' role='button'>Đã quá thời gian làm bài</button>";
                else if($start > $now) echo "<button class='btn btn-hero btn-light w-100' role='button'>Chưa tới thời gian mở đề</button>";
                else echo "<button name='start-test' id='start-test' data-id='".$data['Test']['made']."' class='btn btn-hero btn-info w-100' role='button'>Bắt đầu thi <i class='fa fa-angle-right'></i></button>";
            }
        ?>
    </div>
</div>
<?php
if(isset($data["Check"]['diemthi']) && $data["Check"]['diemthi'] != ''){?>
<div class="content row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-12 p-0">
        <a class="fw-bold text-dark" data-bs-toggle="collapse" href="#xemkq" role="button" aria-expanded="false" aria-controls="xemkq">Kết quả bài thi <i class="fa fa-angle-down"></i></a>
    </div>
</div>
<div class="collapse" id="xemkq">
    <div class="content row justify-content-center align-items-center mb-4">
        <div class="col-lg-6 col-md-12 bg-white p-4 rounded">
            <h4 class="text-center">Điểm của bạn: <span class="display-6 fw-bold"><?php echo $data["Check"]['diemthi'] ?></span> </h4>
            <div class="exam-info mb-3">
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-clock me-2"></i></span><span> Thời gian làm
                            bài</span>
                    </div>
                    <div class="col-6 text-end">
                        <span><?php echo round($data["Check"]['thoigianlambai']/60,0) ?> phút</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-calendar-days me-2"></i></span><span> Thời gian vào thi</span>
                    </div>
                    <div class="col-6 text-end">
                        <span><?php echo date_format(date_create($data["Check"]["thoigianvaothi"]),"H:i d/m/Y")?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-circle-check me-2"></i></span><span> Số câu đúng</span>
                    </div>
                    <div class="col-6 text-end">
                        <span><?php echo $data["Check"]['socaudung'] ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-circle-question me-2"></i></span><span> Tổng số câu trong đề</span>
                    </div>
                    <div class="col-6 text-end">
                        <span><?php echo $data["Test"]["socaude"] + $data["Test"]["socautb"] + $data["Test"]["socaukho"]?></span>
                    </div>
                </div>
            </div>
            <button data-id="<?php echo $data["Check"]['makq']?>" type="button" class="btn btn-hero btn-primary w-100" id="show-exam-detail">Xem chi tiết bài thi</button>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-show-test" tabindex="-1" role="dialog" aria-labelledby="modal-view-test" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết kết quả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <div id="content-file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
<?php }?>
