<style>
footer {
    display: none !important
}
</style>
<!-- <?php echo "<pre>"; var_dump($data["Test"])?> -->
<div class="row g-0 flex-md-grow-1" id="chitietdethi" data-id="<?php echo $data["Test"]["made"]?>">
    <div class="content content-full">
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-alt align-items-center" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="bang-diem-tab" data-bs-toggle="tab"
                        data-bs-target="#bang-diem" role="tab" aria-controls="bang-diem" aria-selected="true">Bảng
                        điểm</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="thong-ke-tab" data-bs-toggle="tab" data-bs-target="#thong-ke"
                        role="tab" aria-controls="thong-ke" aria-selected="false">Thống kê</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="thong-so-cau-tab" data-bs-toggle="tab"
                        data-bs-target="#thong-so-cau" role="tab" aria-controls="thong-so-cau"
                        aria-selected="false">Thông số câu</button>
                </li>
                <li class="nav-item ms-auto">
                    <div class="block-options ps-3 pe-2">
                        <button type="button" class="btn-block-option" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSetting" aria-controls="offcanvasSetting">
                            <i class="si si-info"></i>
                        </button>
                        <a name="" id="" class="btn-block-option" href="#" role="button"><i
                                class="si si-pencil"></i></a>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="fullscreen_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </li>
            </ul>
            <div class="block-content tab-content">
                <div class="tab-pane active" id="bang-diem" role="tabpanel" aria-labelledby="bang-diem-tab"
                    tabindex="0">
                    <form action="#" method="POST" id="search-form" onsubmit="return false;">
                        <div class="row mb-4">
                            <div class="input-group">
                                <div class="col-md-6 d-flex gap-3">
                                    <button class="btn btn-alt-secondary dropdown-toggle btn-filtered-by-group" id="dropdown-filter-group" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $data["Test"]["nhom"][0]["tennhom"]?></button>
                                    <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-group">
                                        <?php
                                            foreach($data["Test"]["nhom"] as $nhom) {
                                                echo '<li><a class="dropdown-item filtered-by-group" href="javascript:void(0)" data-value="'.$nhom['manhom'].'">'.$nhom['tennhom'].'</a></li>';
                                            }
                                        ?>
                                        <!-- <li><a class="dropdown-item filtered-by-group" href="javascript:void(0)" data-value="0">Tất cả</a></li> -->
                                    </ul>
                                    <button class="btn btn-alt-secondary dropdown-toggle btn-filtered-by-state" id="dropdown-filter-state" type="button" data-bs-toggle="dropdown" aria-expanded="false">Đã tham gia</button>
                                    <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-state">
                                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-state="present">Đã tham gia</a></li>
                                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-state="absent">Vắng thi</a></li>
                                    </ul>
                                    <input type="text" class="form-control form-control-alt" id="search-input"
                                        name="search-input" placeholder="Tìm kiếm sinh viên...">
                                    <!-- <span class="input-group-text bg-body border-0">
                                        <i class="fa fa-search"></i>
                                    </span> -->
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center col-sort" data-sort-column="manguoidung" data-sort-order="default">MSSV</th>
                                    <th class="col-sort" data-sort-column="hoten" data-sort-order="default">Họ tên</th>
                                    <th class="text-center col-sort" data-sort-column="diemthi" data-sort-order="default">Điểm</th>
                                    <th class="text-center col-sort" data-sort-column="thoigianvaothi" data-sort-order="default">Thời gian vào thi</th>
                                    <th class="text-center col-sort" data-sort-column="thoigianlambai" data-sort-order="default">Thời gian thi</th>
                                    <th class="text-center col-sort" data-sort-column="solanchuyentab" data-sort-order="default">Số lần thoát</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="took_the_exam">
                            </tbody>
                        </table>
                    </div>
                    <?php if(isset($data["Plugin"]["pagination"]) && $data["Plugin"]["pagination"] == 1) require "./mvc/views/inc/pagination.php"?>
                </div>
                <div class="tab-pane" id="thong-ke" role="tabpanel" aria-labelledby="thong-ke-tab" tabindex="0">
                    <h4 class="fw-normal">Thống kê</h4>
                    <p>...</p>
                </div>
                <div class="tab-pane" id="thong-so-cau" role="tabpanel" aria-labelledby="thong-so-cau-tab"
                    tabindex="0">
                    <h4 class="fw-normal">Thông số câu hỏi</h4>
                    <p>...</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-cau-hoi" tabindex="-1" role="dialog" aria-labelledby="modal-cau-hoi"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết đề thi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <div id="list-question"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSetting" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo $data["Test"]["tende"] ?></h4>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body content-side">
        <!-- <div class="d-md-none push">
            <button type="button" class="btn w-100 btn-alt-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                Thông tin đề thi
            </button>
        </div> -->
        <div>
            <h5 class="mb-3">THÔNG TIN ĐỀ THI</h5>
            <ul class="list-unstyled text-dark fs-sm">
                <li class="mb-1 fs-base"><i class="text-primary fa fa-file-signature me-2"></i><span>Tên đề: <?php echo $data["Test"]["tende"]?></span>
                </li>
                <li class="mb-1 fs-base"><i class="text-primary fa fa-clock me-2"></i><span>Thời gian tạo: <?php echo date_format(date_create($data["Test"]["thoigiantao"]),"H:i d/m/Y")?></span>
                </li>
            </ul>
            <h5 class="mb-3">MÔN THI</h5>
            <p class="mb-3"><?php echo $data["Test"]["mamonhoc"]." - ".$data["Test"]["tenmonhoc"] ?></p>
            <h5 class="mb-3">GIAO CHO</h5>
            <ul class="nav nav-pills nav-justified push">
                <?php 
                    foreach($data["Test"]["nhom"] as $nhom) {
                        echo '<li class="nav-item me-1 mb-2"><a class="nav-link border text-muted" href="./module/detail/'.$nhom['manhom'].'">'.$nhom['tennhom'].'</a></li>';
                    }
                ?>
            </ul>
            <?php 
                if($data["Test"]["loaide"] == 0) {
                    echo '<h5 class="mb-3">NỘI DUNG</h5>
                    <a href="javasript:void(0)" class="text-primary fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modal-cau-hoi" data-id="'.$data["Test"]["made"].'"><i class="fa fa-file me-2"></i>Xem chi tiết</a>';
                }
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-show-test" tabindex="-1" role="dialog" aria-labelledby="modal-cau-hoi"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết kết quả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <div id="content-file">
                    <!-- <div class="question rounded border mb-3">
                        <div class="question-top p-3">
                            <p class="question-content fw-bold mb-3">1. OOP là viết tắt của: </p>
                            <div class="row"><div class="col-6 mb-1">
                            <p class="mb-1"><b>A.</b> Object Open Programming</p></div><div class="col-6 mb-1">
                            <p class="mb-1"><b>B.</b> Open Object Programming</p></div><div class="col-6 mb-1">
                            <p class="mb-1"><b>C.</b> Object Oriented Programming.</p></div><div class="col-6 mb-1">
                            <p class="mb-1"><b>D.</b> Object Oriented Proccessing.</p></div></div>
                        </div>
                        <div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center"><p class="mb-0 text-white me-4">Đáp án của bạn:</p><input type="radio" class="btn-check" name="options-c0" id="option-c0_0" autocomplete="off" disabled="">
                            <label class="btn btn-light rounded-pill me-2 btn-answer-false btn-answer-question" for="option-c0_0">A</label><input type="radio" class="btn-check" name="options-c0" id="option-c0_1" autocomplete="off" disabled="">
                            <label class="btn btn-light rounded-pill me-2 btn-answer btn-answer-question" for="option-c0_1">B</label><input type="radio" class="btn-check" name="options-c0" id="option-c0_2" autocomplete="off" disabled="">
                            <label class="btn btn-light rounded-pill me-2 btn-answer-true btn-answer-question" for="option-c0_2">C</label>
                            <input type="radio" class="btn-check" name="options-c0" id="option-c0_3" autocomplete="off" disabled="">
                            <label class="btn btn-light rounded-pill me-2 btn-answer btn-answer-question" for="option-c0_3">D</label>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
</div>