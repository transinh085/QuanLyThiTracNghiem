<!-- <form class="row g-0 flex-md-grow-1 form-taodethi" onsubmit="return false;">
    <div class="col-md-8 col-lg-7 col-xl-9 col-custom-9 order-md-0">
        <div class="content content-full">
            <form class="block block-rounded form-tao-de" novalidate="novalidate">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Thông báo</h3>
                    </div>
                    <div class="block block-content">
                        <div class="mb-4">
                            <label class="form-label" for="name-exam">Nội dung thông báo</label>
                            <textarea type="text" class="form-control" id="name-exam" name="name-exam" placeholder="Nhập nội dung thông báo"></textarea>
                        </div>
                        
                        
                        <div class="mb-4">
                            <div class="block block-rounded border">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Thông báo cho</h3>
                                    <div class="block-option">
                                        <select class="js-select2 form-select" id="nhom-hp" name="nhom-hp"
                                            style="width: 100%;" data-placeholder="Chọn nhóm học phần thông báo...">
                                        </select>
                                    </div>
                                </div>
                                <div class="block-content pb-3">
                                    <div class="row" id="list-group">
                                        <div class="text-center fs-sm"><img style="width:100px" src="./public/media/svg/empty_data.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-hero btn-primary" id="btn-send-announcement"><i class="fa fa-fw fa-plus me-1"></i>Gửi thông báo</button>
                            <button type="submit" class="btn btn-hero btn-primary" id="btn-send-announcement"><i class="fa fa-fw fa-plus me-1"></i>Tạo thông báo</button>
                            <a class="btn btn-hero btn-success" id="btn-update-quesoftest"><i class="fa fa-fw fa-pencil me-1"></i> Chỉnh sửa danh sách câu hỏi</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</form> -->


<div class="content" data-id="<?php echo $_SESSION["user_id"] ?>">
    <form action="#" method="POST" id="search-form" onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <!-- <button class="btn btn-alt-primary dropdown-toggle btn-filtered-by-state" id="dropdown-filter-state" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                    <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-state">
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="0">Chưa mở</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="1">Đang mở</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="2">Đã đóng</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="3">Tất cả</a></li>
                    </ul> -->
                    <input type="text" class="form-control" id="search-input" name="search-input" placeholder="Tìm kiếm thông báo...">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <a class="btn btn-hero btn-primary" href="./teacher_announcement/add"><i class="fa fa-fw fa-plus me-1"></i> Tạo thông báo</a>
            </div>
        </div>
    </form>
    <div class="list-announces" id="list-announces">
        <div class="block block-rounded block-fx-pop mb-2">
                <div class="block-content block-content-full border-start border-3 border-danger">
                <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="p-1 p-md-3">
                            <h3 class="h4 fw-bold mb-3">
                                <a href="./test/detail/6" class="text-dark link-fx">Nhóm 1</a>
                            </h3>
                            <p class="fs-sm text-muted mb-2">
                                <i class="fa fa-layer-group me-1"></i> Gửi cho học phần <strong data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" style="cursor:pointer" data-bs-original-title="Nhóm 1, Nhóm 2, Nhóm 3">Lập trình Java - NH2022 - HK2</strong>
                            </p>
                            <div class="flex-grow-1 fs-sm pe-2">
                                <div class="fw-semibold">
                                    <i class="fa fa-message me-1"></i>
                                    You are running out of space. Please consider
                                    upgrading your plan.</div>
                                <div class="text-muted">1 hour ago</div>
                            </div>
                        </div>
                        <div class="p-1 p-md-3">
                            <a class="btn btn-sm btn-alt-primary rounded-pill px-3 me-1 my-1" href="./test/update/6">
                                <i class="fa fa-wrench opacity-50 me-1"></i> Chỉnh sửa
                            </a>
                            <a class="btn btn-sm btn-alt-danger rounded-pill px-3 my-1 btn-delete" href="javascript:void(0)" data-id="6">
                                <i class="fa fa-times opacity-50 me-1"></i> Xoá thông báo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row my-3">
        <?php if(isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php"?>
    </div>
</div>
