<div class="content">
    <div class="row">
        <div class="col-6 flex-grow-1">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="si si-magnifier"></i></span>
                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1"
                    placeholder="Lọc theo lớp">
            </div>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end gap-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal-block-vcenter"><i class="fa fa-fw fa-plus me-1"></i> Thêm lớp</button>
            <div class="dropdown">
                <button type="button" class="btn btn-alt-primary" id="dropdown-ecom-filters" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Filters <i class="fa fa-angle-down ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="dropdown-ecom-filters" style="">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        Pending..
                        <span class="badge bg-black-50 rounded-pill">35</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        Processing
                        <span class="badge bg-warning rounded-pill">15</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        For Delivery
                        <span class="badge bg-info rounded-pill">20</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        Canceled
                        <span class="badge bg-danger rounded-pill">72</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        Delivered
                        <span class="badge bg-success rounded-pill">890</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        All
                        <span class="badge bg-primary rounded-pill">997</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="class-group" id="class-group">
        <div>
            <h2 class="content-heading">Lập trình web và ứng dụng nâng cao</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Title</h3>
                            <div class="block-options">
                                <button type="button" class="btn btn-sm btn-alt-primary">Edit</button>
                                <button type="button" class="btn btn-sm btn-alt-danger">Delete</button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Sỉ số: 0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add-group" tabindex="-1" role="dialog" aria-labelledby="modal-add-group"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Thêm lớp</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên lớp</label>
                        <input type="text" class="form-control" name="class_name" id="class_name"
                            placeholder="Nhập tên lớp">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ghi chú</label>
                        <input type="text" class="form-control" name="class_note" id="class_note"
                            placeholder="Nhập ghi chú">
                    </div>
                    <div class="mb-3">
                        <div class="block block-rounded border">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Chọn nhóm học phần
                                </h3>
                            </div>
                            <div class="block-content pb-3">
                                <div class="row mb-1" id="list-group">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="">
                                            <label class="form-check-label" for="">
                                                Nhóm 1
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <a class="fw-bold" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample"><i
                                        class="fa fa-fw fa-plus"></i> Thêm nhóm</a>
                                <div class="collapse" id="collapseExample">
                                    <form method="post" class="mt-2">
                                        <div class="row mb-1">
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="name_group"
                                                    id="name_group" placeholder="Nhập tên nhóm">
                                            </div>
                                            <div class="col-4">
                                                <button id="add_group" type="submit" class="btn btn-primary"
                                                    name="add_group">Tạo nhóm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary" id="add_class">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-group" tabindex="-1" role="dialog" aria-labelledby="modal-update-group"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Cập nhật thông tin</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên lớp</label>
                        <input type="text" class="form-control" name="modal-update__class-name" id="modal-update__class-name"
                            placeholder="Nhập tên lớp">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ghi chú</label>
                        <input type="text" class="form-control" name="modal-update__class-note" id="modal-update__class-note"
                            placeholder="Nhập ghi chú">
                    </div>
                    <input type="hidden" name="modal-update__class-id" id="modal-update__class-id" value="">
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary" id="update_class">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>