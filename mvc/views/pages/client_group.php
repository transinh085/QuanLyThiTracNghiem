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