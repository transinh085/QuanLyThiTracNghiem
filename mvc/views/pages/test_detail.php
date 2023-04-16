<style>
footer {
    display: none !important
}
</style>
<!-- <?php echo "<pre>"; var_dump($data["Test"])?> -->
<div class="row g-0 flex-md-grow-1" id="chitietdethi" data-id="<?php echo $data["Test"]["made"]?>">
    <div class="col-md-4 col-lg-4 col-xl-3 order-md-1 bg-white">
        <div class="content px-2">
            <div class="d-md-none push">
                <button type="button" class="btn w-100 btn-alt-primary" data-toggle="class-toggle"
                    data-target="#side-content" data-class="d-none">
                    Thông tin đề thi
                </button>
            </div>
            <div id="side-content" class="d-none d-md-block push">
                <h6 class="mb-3">THÔNG TIN ĐỀ THI</h6>
                <ul class="list-unstyled text-dark fs-sm">
                    <li class="mb-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bottom Tooltip"><i
                            class="text-primary fa fa-file-signature me-2"></i> Tên đề:
                        <span><?php echo $data["Test"]["tende"] ?></span>
                    </li>
                    <li class="mb-1"><i class="text-primary fa fa-clock me-2"></i> Thời gian tạo:
                        <span><?php echo date_format(date_create($data["Test"]["thoigiantao"]),"H:i d/m/Y")?></span>
                    </li>
                </ul>
                <h6 class="mb-3">MÔN THI</h6>
                <p class="fs-sm mb-3"><?php echo $data["Test"]["mamonhoc"]." - ".$data["Test"]["tenmonhoc"] ?></p>
                <h6 class="mb-3">GIAO CHO</h6>
                <ul class="nav nav-pills nav-justified push">
                    <?php 
                        foreach($data["Test"]["nhom"] as $nhom) {
                            echo '<li class="nav-item me-1 mb-2"><a class="nav-link border text-muted" href="./module/detail/'.$nhom['manhom'].'">'.$nhom['tennhom'].'</a></li>';
                        }
                    ?>
                </ul>
                <?php 
                    if($data["Test"]["loaide"] == 0) {
                        echo '<h6 class="mb-3">NỘI DUNG</h6>
                        <a href="javasript:void(0)" class="text-primary fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modal-cau-hoi" data-id="'.$data["Test"]["made"].'"><i class="fa fa-file me-2"></i>Xem chi tiết</a>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-8 col-xl-9 order-md-0 h100-scroll">
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
                            <div class="mb-4">
                                <div class="input-group">
                                    <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $data["Test"]["nhom"][0]["tennhom"]?></button>
                                    <ul class="dropdown-menu mt-1">
                                        <?php
                                            foreach($data["Test"]["nhom"] as $nhom) {
                                                echo '<li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="'.$nhom['manhom'].'">'.$nhom['tennhom'].'</a></li>';
                                            }
                                        ?>
                                        <!-- <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="0">Tất cả</a></li> -->
                                    </ul>
                                    <input type="text" class="form-control form-control-alt" id="search-input"
                                        name="search-input" placeholder="Tìm kiếm sinh viên..">
                                    <span class="input-group-text bg-body border-0">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>MSSV</th>
                                        <th>Họ tên</th>
                                        <th class="text-center">Điểm</th>
                                        <th class="text-center">Thời gian vào thi</th>
                                        <th class="text-center">Thời gian thi</th>
                                        <th class="text-center">Số lần thoát</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="took_the_exam">
                                </tbody>
                            </table>
                        </div>
                        <nav class="pagination-container">
                            <ul class="pagination justify-content-end mt-2">
                                <li class="page-item">
                                    <a class="page-link first-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="First" data-page="1">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link prev-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>
                                <div class="d-flex" id="list-page"></div>
                                <li class="page-item">
                                    <a class="page-link next-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Next">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link last-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Last">
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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