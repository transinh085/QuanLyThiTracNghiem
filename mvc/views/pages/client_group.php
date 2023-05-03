<div class="content">
    <form onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Đang học tập</button>
                    <ul class="dropdown-menu mt-1">
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-id="1">Đang học tập</a></li>
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-id="0">Đã ẩn</a>
                        </li>
                    </ul>
                    <input type="text" class="form-control" placeholder="Tìm kiếm nhóm..." id="form-search-group">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-join-group"><i class="fa fa-fw fa-plus me-1"></i> Tham gia nhóm</button>
            </div>
        </div>
    </form>
    <div class="row items-push" id="list-groups">
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
                        <label for="" class="form-label">Mã mời</label>
                        <input type="text" class="form-control form-control-alt" name="mamoi" id="mamoi"
                            placeholder="Nhập mã mời">
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
                    <button type="button" class="btn btn-sm btn-primary btn-join-group">Tham gia nhóm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Lập trình Java - NH2023 - HK2 - Nhóm 2</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body content-side">
        <div class="block block-transparent pull-x pull-t mb-0">
            <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="so-settings-tab" data-bs-toggle="tab"
                        data-bs-target="#so-settings" role="tab" aria-controls="so-settings" aria-selected="true">
                        <i class="fa fa-fw fa-cog me-2"></i> Đề kiểm tra
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="so-profile-tab" data-bs-toggle="tab" data-bs-target="#so-profile"
                        role="tab" aria-controls="so-profile" aria-selected="false" tabindex="-1">
                        <i class="fa fa-fw fa-bell me-2"></i> Thông báo
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="so-people-tab" data-bs-toggle="tab" data-bs-target="#so-people"
                        role="tab" aria-controls="so-people" aria-selected="false" tabindex="-1">
                        <i class="far fa-fw fa-user-circle me-2"></i> Bạn bè
                    </button>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel"
                    aria-labelledby="so-settings-tab" tabindex="0">
                    <div class="list-test px-2">
                        <div class="block block-rounded block-fx-pop mb-2">
                            <div class="block-content block-content-full border-start border-3 border-primary">
                                <div class="d-md-flex justify-content-md-between align-items-md-center">
                                    <div class="p-1 p-md-2">
                                        <h3 class="h4 fw-bold mb-3">
                                            <a href="./test/start/1" class="text-dark link-fx">Kiểm tra giữa kì</a>
                                        </h3>
                                        <p class="fs-sm text-muted mb-0">
                                            <i class="fa fa-clock me-1"></i> Diễn ra từ <span>12:00 08/03/2023</span>
                                            đến
                                            <span>12:00 09/03/2023</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" tab-pane pull-x fade fade-up" id="so-profile" role="tabpanel"
                    aria-labelledby="so-profile-tab" tabindex="0">
                    <ul class="list-announce nav-items my-2">
                        <p class="text-center">Không có thông báo</p>
                    </ul>
                </div>
                <div class="tab-pane pull-x fade fade-up" id="so-people" role="tabpanel" aria-labelledby="so-people-tab"
                    tabindex="0">
                    <div class="block mb-0">
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase fs-sm fw-bold">Bạn cùng nhóm</span>
                        </div>
                        <div class="block-content">
                            <ul class="nav-items list-friends">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>