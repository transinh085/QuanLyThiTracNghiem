<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách nhóm quyền</h3>
            <div class="block-options">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-add-role"><i class="fa-regular fa-plus"></i> Thêm mới</button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search"
                                    name="one-ecom-orders-search" placeholder="Tìm kiếm nhóm quyền..">
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
                                    <th class="text-center">Mã nhóm</th>
                                    <th>Tên nhóm</th>
                                    <th class="text-center">Số người dùng</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center fs-sm"><strong>1</strong></td>
                                    <td>Admin</td>
                                    <td class="text-center fs-sm">2</td>
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
                                <tr>
                                    <td class="text-center fs-sm"><strong>2</strong></td>
                                    <td>Giảng viên</td>
                                    <td class="text-center fs-sm">3</td>
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
                                <tr>
                                    <td class="text-center fs-sm"><strong>2</strong></td>
                                    <td>Sinh viên</td>
                                    <td class="text-center fs-sm">300</td>
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
    </div>
</div>

<div class="modal fade" id="modal-add-role" tabindex="-1" role="dialog"
    aria-labelledby="modal-add-role" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm nhóm quyền</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
            <form>
                        <div class="mb-2">
                            <label class="form-label" for="ten-nhom-quyen">Tên nhóm quyền</label>
                            <input type="text" class="form-control form-control-alt" id="ten-nhom-quyen" name="ten-nhom-quyen"
                                placeholder="VD: Giảng viên">
                        </div>
                        <table class="table table-vcenter table-role">
                            <thead>
                                <tr>
                                    <th>Tên quyền</th>
                                    <th class="text-center">Xem</th>
                                    <th class="text-center">Thêm mới</th>
                                    <th class="text-center">Cập nhật</th>
                                    <th class="text-center">Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Người dùng</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nguoidung" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nguoidung" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nguoidung" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nguoidung" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Học phần</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="hocphan" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="hocphan" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="hocphan" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="hocphan" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Câu hỏi</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="cauhoi" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="cauhoi" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="cauhoi" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="cauhoi" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sinh viên</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="sinhvien" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="sinhvien" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="sinhvien" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="sinhvien" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Môn học</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="monhoc" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="monhoc" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="monhoc" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="monhoc" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Đề thi</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="dethi" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="dethi" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="dethi" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="dethi" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nhóm quyền</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nhomquyen" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nhomquyen" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nhomquyen" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="nhomquyen" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thông báo</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="thongbao" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="thongbao" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="thongbao" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="thongbao" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cài đặt</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="caidat" value="view">
                                    </td>
                                    <td class="text-center">&nbsp</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="caidat" value="update">
                                    </td>
                                    <td class="text-center">&nbsp</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal" id="save-role">Lưu</button>
            </div>
        </div>
    </div>
</div>