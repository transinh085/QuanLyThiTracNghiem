<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tất cả người dùng</h3>
            <div class="block-options">
                <button type="button" class="btn btn-hero btn-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#modal-add-user" id="btn-and" data-role="nguoidung" data-action="create">Thêm người dùng</button>
            </div>
        </div>
        <div class="block-content bg-body-dark">
            <form action="#" id="search-form" onsubmit="return false;">
                <div class="row mb-4">
                    <div class="input-group">
                        <div class="col-md-6 d-flex gap-3">
                            <button class="btn btn-alt-secondary dropdown-toggle btn-filtered-by-role" id="dropdown-filter-role" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                            <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-role">
                                <li><a class="dropdown-item filtered-by-role" href="javascript:void(0)" data-id="0">Tất cả</a></li>
                                <?php
                                    foreach ($data["Roles"] as $role) {
                                        echo '<li><a class="dropdown-item filtered-by-role" href="javascript:void(0)" data-id="'.$role['manhomquyen'].'">'.$role['tennhomquyen'].'</a></li>';
                                    }
                                ?>
                            </ul>
                            <input type="text" class="form-control form-control-alt" id="search-input" name="search-input"
                            placeholder="Tìm kiếm người dùng...">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="block-content">
            <div class="table-responsive" id="get_user">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">MSSV</th>
                            <th>Họ và tên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Nhóm quyền</th>
                            <th class="text-center">Ngày tham gia</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center col-header-action">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="list-user">
                    </tbody>
                </table>
            </div>
            <?php if (isset($data["Plugin"]["pagination"]))
                require "./mvc/views/inc/pagination.php" ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="modal-add-user"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-transparent bg-white mb-0 block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="btabs-static-home-tab" data-bs-toggle="tab"
                                data-bs-target="#btabs-static-home" role="tab" aria-controls="btabs-static-home"
                                aria-selected="true">
                                Thêm thủ công
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="btabs-static-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#btabs-static-profile" role="tab" aria-controls="btabs-static-profile"
                                aria-selected="false">
                                Thêm từ file
                            </button>
                        </li>
                        <li class="nav-item ms-auto">
                            <button type="button" class="btn btn-close p-3" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <form novalidate="novalidate" onsubmit="return false;" class="tab-pane active form-add-user"
                            id="btabs-static-home" role="tabpanel" aria-labelledby="btabs-static-home-tab" tabindex="0">
                            <div class="mb-4">
                                <label for="masinhvien" class="form-label">Mã sinh viên</label>
                                <input type="text" class="form-control form-control-alt" name="masinhvien" id="masinhvien"
                                    placeholder="Nhập mã sinh viên">
                            </div>
                            <div class="mb-4">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-alt" name="user_email" id="user_email"
                                    placeholder="Nhập địa chỉ email">
                            </div>
                            <div class="mb-4">
                                <label for="user_name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control form-control-alt" name="user_name" id="user_name"
                                    placeholder="Nhập họ và tên">
                            </div>
                            <div class="mb-4 d-flex gap-4">
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
                            <div class="mb-4">
                                <label for="user_ngaysinh" class="form-label">Ngày sinh</label>
                                <input type="text" class="js-flatpickr form-control form-control-alt" id="user_ngaysinh"
                                    name="user_ngaysinh" placeholder="Ngày sinh">
                            </div>
                            <div class="mb-4">
                                <label for="user_nhomquyen" class="form-label">Nhóm quyền</label>
                                <select class="js-select2 form-select data-nhomquyen" data-tab="1" id="user_nhomquyen"
                                    name="user_nhomquyen" style="width: 100%;" data-placeholder="Choose one..">
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="user_password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control form-control-alt" name="user_password"
                                    id="user_password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <label for="user_status" class="form-label">Trạng thái</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="user_status">
                                    <label class="form-check-label" for="user_status"></label>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-end">
                                <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                    data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-sm btn-primary add-user-element"
                                    id="btn-add-user">Lưu</button>
                                <button type="button" class="btn btn-sm btn-primary update-user-element"
                                    id="btn-update-user" data-id="">Cập nhật</button>
                            </div>
                        </form>
                        <div class="tab-pane" id="btabs-static-profile" role="tabpanel"
                            aria-labelledby="btabs-static-profile-tab" tabindex="0">
                            <form id="form-upload" method="POST" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="user_password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control form-control-alt" name="user_password"
                                        id="ps_user_group" placeholder="Nhập mật khẩu cho sinh viên!">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="js-ckeditor">Nội dung</label>
                                    <input class="form-control" type="file" id="file-cau-hoi" accept=".xlsx, .xls, .csv" required>
                                </div>
                                <div class="mb-4">
                                    <em>Vui lòng soạn người dùng theo đúng định dạng. <a href="">Tải về file mẫu
                                            Docx</a></em>
                                </div>
                                <div class="mb-4 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-hero btn-primary" id="nhap-file"><i
                                            class="fa fa-cloud-arrow-up"></i> Thêm vào hệ thống</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>