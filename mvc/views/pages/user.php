<div class="content">
    <div class="row items-push">
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="be_pages_ecom_orders.html">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-primary mb-1">78</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Người dùng
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">126</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Học sinh
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">350</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Giáo viên
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">89.752</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        This Month
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tất cả người dùng</h3>
            <div class="block-options">
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-add-user">Thêm người dùng</button>
                <div class="dropdown">
                    <button type="button" class="btn btn-alt-secondary" id="dropdown-ecom-filters"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filters
                        <i class="fa fa-angle-down ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Pending..
                            <span class="badge bg-primary rounded-pill">78</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Processing
                            <span class="badge bg-black-50 rounded-pill">12</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            For Delivery
                            <span class="badge bg-black-50 rounded-pill">20</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Canceled
                            <span class="badge bg-black-50 rounded-pill">5</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Delivered
                            <span class="badge bg-black-50 rounded-pill">280</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            All
                            <span class="badge bg-black-50 rounded-pill">19k</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content bg-body-dark">
            <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                <div class="mb-4">
                    <input type="text" class="form-control form-control-alt" id="dm-ecom-orders-search"
                        name="dm-ecom-orders-search" placeholder="Tìm kiếm người dùng...">
                </div>
            </form>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th>Họ và tên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Nhóm quyền</th>
                            <th class="text-center">Ngày tham gia</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="list-user">
                    <tr>
                            <td class="text-center">
                                <strong>001</strong>
                            </td>
                            <td class="fs-sm d-flex align-items-center">
                                <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg" alt="">
                                <div class="d-flex flex-column">
                                    <strong class="text-primary">Âu Hạo Nhiên</strong>
                                    <span class="fw-normal fs-sm text-muted">thekrister123@gmail.com</span>
                                </div>
                            </td>
                            <td class="text-center">Nữ</td>
                            <td class="text-center">20-03-2003</td>
                            <td class="text-center">1</td>
                            <td class="text-center">2023-03-11</td>
                            <td class="text-center">
                                <span class="badge bg-success badge-pill text-uppercase fw-bold py-2 px-3">Active</span>
                            </td> 
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary user-edit" href="javascript:void(0)"
                                    data-bs-toggle="modal" data-bs-target="#modal-edit-chapter" aria-label="Edit" data-bs-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary" href="" data-bs-toggle="tooltip"
                                    aria-label="Delete" data-bs-original-title="Delete">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Photos Search Navigation">
                <ul class="pagination justify-content-end mt-2">
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

<div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="modal-add-user"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Thêm người dùng</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="user_name" id="user_name"
                            placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giới tính</label>
                        <input type="text" class="form-control" name="user_gender" id="user_gender"
                            placeholder="Nhập giới tính">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ngày sinh</label>
                        <input type="text" class="form-control" name="user_ngaysinh" id="user_ngaysinh"
                            placeholder="Nhập ngày sinh">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="user_email" id="user_name"
                            placeholder="Nhập email">
                    </div>
                    <div class="mb-3">
                        <div class="block block-rounded border">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Chọn nhóm quyền
                                </h3>
                            </div>
                            <div class="block-content pb-3">
                                <div class="row mb-1" id="list-group">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" id="group-0"
                                                name="ds-grp">
                                            <label class="form-check-label" for="group-0">Người dùng</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1" id="list-group">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" id="group-0" name="ds-grp">
                                            <label class="form-check-label" for="group-0">Học sinh</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1" id="list-group">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" id="group-0" name="ds-grp">
                                            <label class="form-check-label" for="group-0">Giáo viên</label>
                                        </div>
                                    </div>
                                </div>
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

<div class="modal fade" id="modal-edit-chapter" tabindex="-1" role="dialog" aria-labelledby="modal-add-chapter" aria-modal="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Sửa thông tin người dùng</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="chapter_id" id="mamon" placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giới tính</label>
                        <input type="text" class="form-control" name="chapter_name" id="tenmon" placeholder="Nhập giới tính">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ngày sinh</label>
                        <input type="text" class="form-control" name="chapter_name" id="tenmon" placeholder="Nhập ngày sinh">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="chapter_name" id="tenmon" placeholder="Nhập email">
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