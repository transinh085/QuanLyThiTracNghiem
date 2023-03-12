<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách môn học</h3>
            <div class="block-options">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-subject"><i class="fa-regular fa-floppy-disk"></i> Thêm mới</button>
            </div>
        </div>
        <div class="block-content">
            <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search" name="one-ecom-orders-search" placeholder="Tìm kiếm môn học..">
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
                            <th class="text-center">Mã môn</th>
                            <th>Tên môn</th>
                            <th class="d-none d-sm-table-cell text-center">Số chương</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="list-subject">
                    </tbody>
                </table>
            </div>
            <nav aria-label="Photos Search Navigation">
                <ul class="pagination pagination-sm justify-content-end mt-2">
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                            Prev
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-subject" tabindex="-1" role="dialog" aria-labelledby="modal-add-subject" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Thêm môn học</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Mã môn học</label>
                        <input type="text" class="form-control" name="subject_id" id="subject_id" placeholder="Nhập mã môn học">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Nhập tên môn học">
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary" id="add_class">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-chapter" tabindex="-1" role="dialog" aria-labelledby="modal-add-chapter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Thêm môn học</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Mã môn học</label>
                        <input type="text" class="form-control" name="chapter_id" id="chapter_id" placeholder="Nhập mã môn học">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control" name="chapter_name" id="chapter_name" placeholder="Nhập tên môn học">
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary" id="add_class">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-chapter" tabindex="-1" role="dialog" aria-labelledby="modal-add-chapter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Sửa tên môn học</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Mã môn học</label>
                        <input type="text" class="form-control" name="chapter_id" id="mamon" placeholder="Nhập mã môn học">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control" name="chapter_name" id="tenmon" placeholder="Nhập tên môn học">
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary" id="edit_class">Lưu</button>
                    <input type="hidden" value="" id="mamonhoc">
                    <input type="hidden" value="" id="machuong">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                            <tbody id="showChapper">
                                <tr>
                                    <td class="text-center fs-sm"><strong>1</strong></td>
                                    <td>Quản trị kinh tế</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary delete_roles" href="javascript:void(0)"
                                            data-bs-toggle="tooltip" aria-label="Delete"
                                            data-bs-original-title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <input type="hidden" value="" id="chaperId">
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <div class="block block-rounded border">
                            <div class="block-content pb-3">
                                <a class="fw-bold" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="btnaddChapper"><i class="fa fa-fw fa-plus"></i>Thêm chương</a>
                                <div class="collapse" id="collapseExample">
                                    <form method="post" class="mt-2">
                                        <div class="row mb-1">
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="name_group" id="name_chaper" placeholder="Nhập tên chương">
                                            </div>
                                            <div class="col-4">
                                                <button id="addchaper" type="submit" class="btn btn-alt-primary">Tạo chương</button>
                                                <button id="editchaper" type="submit" class="btn btn-primary">Đổi tên</button>
                                                <button type="button" class="btn btn-alt-secondary close-chapter">Huỷ</button>
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