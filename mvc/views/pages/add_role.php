<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tạo nhóm quyền</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10">
                    <form action="./roles/addRole" method="POST">
                        <div class="mb-4">
                            <label class="form-label" for="one-ecom-product-id">Tên nhóm quyền</label>
                            <input type="text" class="form-control" id="one-ecom-product-id" name="one-ecom-product-id"
                                placeholder="VD: Giảng viên">
                        </div>
                        <table class="table table-vcenter">
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
                                        <input class="form-check-input" type="checkbox" name="user" value="view">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="user" value="create">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="user" value="update">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="user" value="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Học phần</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Câu hỏi</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Học sinh</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Môn học</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Đề thi</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nhóm quyền</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thông báo</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cài đặt</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="1" id="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary"><i class="fa fa-fw fa-plus me-1"></i> Tạo
                                nhóm quyền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Your Block -->
</div>