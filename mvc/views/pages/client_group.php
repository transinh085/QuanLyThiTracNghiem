<div class="content">
    <form onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Đang giảng dạy</button>
                    <ul class="dropdown-menu mt-1">
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="1">Đang giảng
                                dạy</a></li>
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="0">Đã ẩn</a>
                        </li>
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="2">Tất cả</a>
                        </li>
                    </ul>
                    <input type="text" class="form-control" placeholder="Tìm kiếm nhóm..." id="form-search-group">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-join-group"><i class="fa fa-fw fa-plus me-1"></i> Thêm nhóm</button>
            </div>
        </div>
    </form>
    <div class="row items-push">
        <div class="col-md-6 col-xl-4">
            <div class="block block-rounded h-100 mb-0">
                <div class="block-header">
                    <div class="flex-grow-1 text-muted fs-sm fw-semibold">
                        <i class="fa fa-user me-1"></i>Trần Nhật Sinh
                    </div>
                    <div class="block-options">
                        <div class="dropdown">
                            <button type="button" class="btn btn-alt-secondary dropdown-toggle module__dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-gears"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-users me-1"></i> People
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-bell me-1"></i> Alerts
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-check-double me-1"></i> Tasks
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="be_pages_projects_edit.html">
                                    <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Project
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content bg-body-light text-center">
                    <h3 class="fs-4 mb-3">
                        <a href="javascript:void(0)" class="link-fx">841059 - Lập trình hướng đối tượng</a>
                    </h3>
                    <h5 class="fs-6 text-muted mb-3">NH2023 - HK1</h5>
                    <div class="push">
                        <span class="badge bg-info text-uppercase fw-bold py-2 px-3">Nhóm 1</span>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="row g-sm">
                        <div class="col-6">
                            <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-eye me-1 opacity-50"></i> View
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-archive me-1 opacity-50"></i> Archive
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-join-group" tabindex="-1" role="dialog" aria-labelledby="modal-join-group"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tham gia nhóm học phần</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="mb-3">
                        <label for="" class="form-label">Mã lớp</label>
                        <input type="text" class="form-control form-control-alt" name="" id=""
                            placeholder="Nhập mã lớp">
                    </div>
                    <p class="form-text text-muted">Đề nghị giảng viên của bạn cung cấp mã lớp rồi
                            nhập mã đó vào đây.</p>
                    <p class="form-text text-muted">Cách đăng nhập bằng mã lớp học<br>
                        - Sử dụng tài khoản được cấp phép <br>
                        - Sử dụng mã lớp học gồm 7 chữ cái hoặc số, không có dấu cách hoặc ký hiệu 
                    </p>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary">Tham gia nhóm</button>
                </div>
            </div>
        </div>
    </div>
</div>