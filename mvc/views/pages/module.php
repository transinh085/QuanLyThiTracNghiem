<div class="content">
    <div class="row">
        <div class="col-6 flex-grow-1">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="si si-magnifier"></i></span>
                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1"
                    placeholder="Tìm kiếm nhóm...">
            </div>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end gap-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal-add-group"><i class="fa fa-fw fa-plus me-1"></i> Thêm nhóm</button>
            <div class="dropdown">
                <button type="button" class="btn btn-alt-primary" id="dropdown-ecom-filters" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Bộ lọc <i class="fa fa-angle-down ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="dropdown-ecom-filters" style="">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        Tất cả
                        <span class="badge bg-primary rounded-pill">997</span>
                    </a>
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
                </div>
            </div>
        </div>
    </div>
    <div class="class-group" id="class-group">
    </div>
</div>
<div class="modal fade" id="modal-add-group" tabindex="-1" role="dialog" aria-labelledby="modal-add-group"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Thêm nhóm</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên nhóm</label>
                        <input type="text" class="form-control" name="ten-nhom" id="ten-nhom"
                            placeholder="Nhập tên nhóm">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ghi chú</label>
                        <input type="text" class="form-control" name="ghi-chu" id="ghi-chu"
                            placeholder="Nhập ghi chú">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Môn học</label>
                        <select class="js-select2 form-select" id="mon-hoc" name="mon-hoc" style="width: 100%;" data-placeholder="Chọn môn học">
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="" class="form-label">Năm học</label>
                            <select class="js-select2 form-select" id="nam-hoc" name="nam-hoc" style="width: 100%;" data-placeholder="Chọn năm học">
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Học kỳ</label>
                            <select class="js-select2 form-select" id="hoc-ky" name="hoc-ky" style="width: 100%;" data-placeholder="Chọn học kỳ">
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
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