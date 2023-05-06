<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách nhóm quyền</h3>
            <div class="block-options">
                <button data-role="nhomquyen" data-action="create" type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-add-role"><i class="fa-regular fa-plus me-1"></i> Thêm mới</button>
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
                                    <th class="text-center">Mã nhóm quyền</th>
                                    <th>Tên nhóm</th>
                                    <th class="text-center">Số người dùng</th>
                                    <th class="text-center col-header-action">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="list-roles"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-role" tabindex="-1" role="dialog" aria-labelledby="modal-add-role"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title add-role-element">Thêm nhóm quyền</h5>
                <h5 class="modal-title update-role-element">Sửa nhóm quyền</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <form class="form_role">
                    <div class="mb-2">
                        <label class="form-label" for="ten-nhom-quyen">Tên nhóm quyền</label>
                        <input type="text" class="form-control form-control-alt" id="ten-nhom-quyen"
                            name="ten-nhom-quyen" placeholder="VD: Giảng viên">
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
                                <td>Chương</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="chuong" value="view">
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="chuong" value="create">
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="chuong" value="update">
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="chuong" value="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>Phân công</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="phancong" value="view">
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="phancong" value="create">
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="phancong" value="update">
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="phancong" value="delete">
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
                            <!-- <tr>
                                <td>Cài đặt</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="caidat" value="view">
                                </td>
                                <td class="text-center">&nbsp</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="caidat" value="update">
                                </td>
                                <td class="text-center">&nbsp</td>
                            </tr> -->
                        </tbody>
                    </table>
                    <div class="row justify-content-around">
                        <div class="col-6 form-check form-switch d-flex justify-content-center gap-2">
                            <input class="form-check-input" type="checkbox" value="join" id="join_dethi"
                                name="tgthi">
                            <label class="form-check-label" for="join_dethi">Tham gia thi</label>
                        </div>
                        <div class="col-6 form-check form-switch d-flex justify-content-center gap-2">
                            <input class="form-check-input" type="checkbox" value="join" id="join_hocphan"
                                name="tghocphan">
                            <label class="form-check-label" for="join_hocphan">Tham gia học phần</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="manhomquyen">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-sm btn-primary add-role-element" id="save-role">Lưu</button>
                <button type="button" class="btn btn-sm btn-primary update-role-element" id="update-role-btn">Cập nhật</button>
            </div>
        </div>
    </div>
</div>