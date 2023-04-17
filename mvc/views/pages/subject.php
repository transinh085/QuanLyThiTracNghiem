<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách môn học</h3>
            <div class="block-options">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-add-subject"><i class="fa-regular fa-floppy-disk"></i> Thêm mới</button>
            </div>
        </div>
        <div class="block-content">
            <form action="#" id="search-form" onsubmit="return false;">
                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-alt" id="search-input"
                            name="search-input" placeholder="Tìm kiếm môn học...">
                        <button class="input-group-text bg-body border-0 btn-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">Mã môn</th>
                            <th>Tên môn</th>
                            <th class="d-none d-sm-table-cell text-center">Số tín chỉ</th>
                            <th class="d-none d-sm-table-cell text-center">Số tiết lý thuyết</th>
                            <th class="d-none d-sm-table-cell text-center">Số tiết thực hành</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="list-subject">
                    </tbody>
                </table>
            </div>
            <?php if(isset($data["Plugin"]["pagination"]) && $data["Plugin"]["pagination"] == 1) require "./mvc/views/inc/pagination.php"?>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-subject" tabindex="-1" role="dialog" aria-labelledby="modal-add-subject"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title add-subject-element">Thêm môn học</h3>
                    <h3 class="block-title update-subject-element">Chỉnh sửa môn học</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form class="block-content fs-sm form-add-subject">
                    <div class="mb-3">
                        <label for="" class="form-label">Mã môn học</label>
                        <input type="text" class="form-control form-control-alt" name="mamonhoc" id="mamonhoc"
                            placeholder="Nhập mã môn học">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control form-control-alt" name="tenmonhoc" id="tenmonhoc"
                            placeholder="Nhập tên môn học">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tổng số tín chỉ</label>
                        <input type="number" class="form-control form-control-alt" name="sotinchi"
                            id="sotinchi" placeholder="Nhập số tín chỉ">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">Số tiết lý thuyết</label>
                                <input type="number" class="form-control form-control-alt" name="sotiet_lt"
                                    id="sotiet_lt" placeholder="Nhập số tiết lý thuyết">
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Số tiết thực hành</label>
                                <input type="number" class="form-control form-control-alt" name="sotiet_th"
                                    id="sotiet_th" placeholder="Nhập số tiết thực hành">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary add-subject-element" id="add_subject">Lưu</button>
                    <button type="button" class="btn btn-sm btn-primary update-subject-element" id="update_subject" data-id="">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-chapter" tabindex="-1" role="dialog" aria-labelledby="modal-chapter"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Danh sách chương</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tên chương</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="showChapper"></tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <div class="block block-rounded border">
                            <div class="block-content pb-3">
                                <a class="fw-bold" data-bs-toggle="collapse" href="#collapseChapter" role="button"
                                    aria-expanded="false" aria-controls="collapseChapter" id="btn-add-chapter"><i
                                        class="fa fa-fw fa-plus"></i>Thêm chương</a>
                                <div class="collapse" id="collapseChapter">
                                    <form method="post" class="mt-2">
                                        <div class="row mb-1">
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="name_chapter"
                                                    id="name_chapter" placeholder="Nhập tên chương">
                                            </div>
                                            <div class="col-4">
                                                <input type="hidden" name="mamon_chuong" id="mamon_chuong">
                                                <input type="hidden" name="machuong" id="machuong">
                                                <button id="add-chapter" type="submit" class="btn btn-alt-primary">Tạo
                                                    chương</button>
                                                <button id="edit-chapter" type="submit" class="btn btn-primary">Đổi
                                                    tên</button>
                                                <button type="button"
                                                    class="btn btn-alt-secondary close-chapter">Huỷ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-primary me-1" data-bs-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
</div>