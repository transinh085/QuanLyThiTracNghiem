<style>
#page-footer {
    display: none
}
</style>
<form class="row g-0 flex-md-grow-1 form-taodethi" onsubmit="return false;">
    <div class="col-md-4 col-lg-5 col-xl-3 order-md-1 bg-white">
        <div class="content px-2">
            <div class="d-md-none push">
                <button type="button" class="btn w-100 btn-alt-primary" data-toggle="class-toggle"
                    data-target="#side-content" data-class="d-none">
                    CẤU HÌNH
                </button>
            </div>
            <div id="side-content" class="d-none d-md-block push">
                <h3 class="fs-5">CẤU HÌNH</h3>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="tudongsoande" name="tudongsoande" checked>
                    <label class="form-check-label" for="tudongsoande">Tự động lấy từ ngân hàng đề</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="xemdiem" name="xemdiem">
                    <label class="form-check-label" for="xemdiem">Xem điểm sau khi thi xong</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="xemda" name="xemda">
                    <label class="form-check-label" for="xemda">Xem đáp án khi thi xong</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="xembailam" name="xembailam">
                    <label class="form-check-label" for="xembailam">Xem bài làm khi thi xong</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="daocauhoi" name="daocauhoi">
                    <label class="form-check-label" for="daocauhoi">Đảo câu hỏi</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="daodapan" name="daodapan">
                    <label class="form-check-label" for="daodapan">Đảo đáp án</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="tudongnop" name="tudongnop">
                    <label class="form-check-label" for="tudongnop">Tự động nộp bài khi chuyển tab</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-7 col-xl-9 order-md-0">
        <div class="content content-full">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <?php 
                    $title = "";
                    if($data["Action"] == "create") $title = "Tạo mới đề thi" ;
                    else if($data["Action"] == "update") $title = "Cập nhật đề thi";
                    ?>
                    <h3 class="block-title"><?php echo $title ?></h3>
                </div>
                <div class="block-content">
                    <div class="mb-4">
                        <label class="form-label" for="name-exam">Tên đề kiểm tra</label>
                        <input type="text" class="form-control" id="name-exam" name="name-exam"
                            placeholder="Nhập tên đề kiểm tra">
                    </div>
                    <div class="row mb-4">
                        <label class="form-label" for="time-start">Thời gian bắt
                            đầu</label>
                        <div class="col-xl-6">
                            <input type="text" class="js-flatpickr form-control" id="time-start" name="time-start"
                                data-enable-time="true" data-time_24hr="true" placeholder="Từ">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" class="js-flatpickr form-control" id="time-end" name="time-end"
                                data-enable-time="true" data-time_24hr="true" placeholder="Đến">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text">Thời gian làm bài</span>
                            <input type="number" class="form-control text-center" id="exam-time" name="exam-time"
                                placeholder="00">
                            <span class="input-group-text">phút</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="block block-rounded border">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Giao cho</h3>
                                <div class="block-option">
                                    <select class="js-select2 form-select" id="nhom-hp" name="nhom-hp"
                                        style="width: 100%;" data-placeholder="Chọn nhóm học phần giảng dạy..." <?php if($data["Action"] == "update") echo "disabled"?>>
                                    </select>
                                </div>
                            </div>
                            <div class="block-content pb-3">
                                <div class="row" id="list-group">
                                    <div class="text-center fs-sm"><img style="width:100px"
                                            src="./public/media/svg/empty_data.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 show-chap">
                        <label class="form-label">Chương</label>
                        <select class="js-select2 form-select" id="chuong" name="chuong" style="width: 100%;"
                            data-placeholder="Chọn nhiều chương..." multiple>
                        </select>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label" for="coban">Số câu dễ</label>
                                <input type="number" class="form-control" name="coban" id="coban">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="trungbinh">Số câu trung bình</label>
                                <input type="number" class="form-control" name="trungbinh" id="trungbinh">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="kho">Số câu khó</label>
                                <input type="number" class="form-control" name="kho" id="kho">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <?php 
                        if($data["Action"] == "create") echo '<button type="submit" class="btn btn-hero btn-primary" id="btn-add-test"><i class="fa fa-fw fa-plus me-1"></i> Tạo đề</button>';
                        else if($data["Action"] == "update") echo '<button type="submit" class="btn btn-hero btn-primary" id="btn-update-test"><i class="fa fa-fw fa-plus me-1"></i> Cập nhật đề</button>';
                        ?>
                        <a class="btn btn-hero btn-success" id="btn-update-quesoftest"><i class="fa fa-fw fa-pencil me-1"></i> Chỉnh sửa danh sách câu hỏi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>