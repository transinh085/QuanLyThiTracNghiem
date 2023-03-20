<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tất cả người dùng</h3>
            <div class="block-options">
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modal-add-user">Thêm người dùng</button>
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
            <div class="table-responsive" id="get_user">
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
                    </tbody>
                </table>
            </div>
            <nav aria-label="Photos Search Navigation">
                <ul class="pagination justify-content-end mt-2" id="getNumberPage">
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title add-user-element">Thêm người dùng</h3>
                    <h3 class="block-title update-user-element">Chỉnh sửa người dùng</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-alt" name="user_email" id="user_email"
                            placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control form-control-alt" name="user_name" id="user_name"
                            placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3 d-flex gap-4">
                        <label for="gender-male" class="form-label">Giới tính</label>
                        <div class="space-x-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender-male" name="user_gender"
                                    value="1">
                                <label class="form-check-label" for="gender-male">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender-female" name="user_gender"
                                    value="0">
                                <label class="form-check-label" for="gender-female">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="user_ngaysinh" class="form-label">Ngày sinh</label>
                        <input type="text" class="js-flatpickr form-control form-control-alt" id="user_ngaysinh"
                            name="example-flatpickr-custom" placeholder="Ngày sinh">
                    </div>
                    <div class="mb-3">
                        <label for="user_nhomquyen" class="form-label">Nhóm quyền</label>
                        <select class="js-select2 form-select data-nhomquyen" data-tab="1" id="user_nhomquyen"
                            name="user_nhomquyen" style="width: 100%;" data-placeholder="Choose one..">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control form-control-alt" name="user_password"
                            id="user_password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="mb-3 d-flex align-items-center gap-5">
                        <label for="user_status" class="form-label">Trạng thái</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="user_status">
                            <label class="form-check-label" for="user_status"></label>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary add-user-element" id="btn-add-user">Lưu</button>
                    <button type="button" class="btn btn-sm btn-primary update-user-element" id="btn-update-user"
                        data-id="">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>