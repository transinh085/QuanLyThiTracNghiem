<div class="content" data-id="<?php echo $data['Detail']['manhom'] ?>">
    <div class="row">
        <div class="col-4 flex-grow-1">
            <form action="#" id="search-form" onsubmit="return false;">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="si si-magnifier"></i></span>
                    <input type="text" class="form-control" placeholder="Tìm kiếm sinh viên..." id="search-input" name="search-input">
                </div>
            </form>
        </div>
        <div class="col-8 d-flex align-items-center justify-content-end gap-3">
            <button type="button" class="btn btn-sm btn-primary" id="exportStudents"><i
                    class="fa-solid fa-file me-1"></i>Xuất danh sách
                SV</button>
            <button type="button" class="btn btn-primary btn-sm" id="exportScores"><i
                    class="fa-solid fa-file me-1"></i>Xuất bảng
                điểm</button>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#modal-block-vcenter"><i class="fa fa-fw fa-plus me-1"></i>Thêm sinh viên</button>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSetting" aria-controls="offcanvasSetting"><i class="fa fa-cog"></i></button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <?php echo $data['Detail']['mamonhoc'] . " - " . $data['Detail']['tenmonhoc'] . " - NH" . $data['Detail']['namhoc'] . " - HK" . $data['Detail']['hocky'] . " - " . $data['Detail']['tennhom'] ?>
                    </h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <code>Sỉ số: <span class="number-participants"></span></code>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-vcenter">
                        <thead>
                            <tr class="table-col-title">
                                <th class="text-center">STT</th>
                                <th class="col-sort" data-sort-column="hoten" data-sort-order="default">Họ tên</th>
                                <th class="text-center col-sort" data-sort-column="id" data-sort-order="default">Mã sinh viên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Ngày sinh</th>
                                <th class="text-center" style="width: 150px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="list-student">
                        </tbody>
                    </table>
                    <?php if(isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php"?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
    aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent bg-white mb-0">
                <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="them-thu-cong-tab" data-bs-toggle="tab"
                            data-bs-target="#them-thu-cong" role="tab" aria-controls="them-thu-cong"
                            aria-selected="true">
                            Thêm thủ công
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="ma-moi-tab" data-bs-toggle="tab" data-bs-target="#ma-moi"
                            role="tab" aria-controls="ma-moi" aria-selected="false">
                            Tham gia bằng mã mời
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="them-file-excel-tab" data-bs-toggle="tab"
                            data-bs-target="#them-file-excel" role="tab" aria-controls="them-file-excel"
                            aria-selected="false">
                            Thêm bằng file Excel
                        </button>
                    </li>
                    <li class="nav-item ms-auto">
                        <button type="button" class="btn btn-close p-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane fade fade-up show active" id="them-thu-cong" role="tabpanel"
                        aria-labelledby="them-thu-cong-tab" tabindex="0">
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="mssv" id="mssv"
                                    placeholder="Mã sinh viên">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ và tên">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Số điện thoại">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="js-flatpickr form-control" id="ngaysinh" name="ngaysinh"
                                    placeholder="Ngày sinh" data-date-format="d-m-Y">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="matkhau" id="matkhau"
                                    placeholder="Mật khẩu">
                            </div>
                            <div class="mb-3 row">
                                <label class="col-2" for="">Giới tính</label>
                                <div class="col-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                        <label class="form-check-label" for="male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="0">
                                        <label class="form-check-label" for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="block-content block-content-full text-end">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary btn-add-sv" data-bs-dismiss="modal">Thêm sinh
                        viên</button>
                </div>
                    </div>
                    <div class="tab-pane fade fade-up" id="ma-moi" role="tabpanel" aria-labelledby="ma-moi-tab"
                        tabindex="0">
                        <h2 class="display-1 text-center py-6" id="show-ma-moi"></h2>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="text-center mb-0">
                                <?php echo $data['Detail']['mamonhoc'] . " - " . $data['Detail']['tenmonhoc'] . " - NH" . $data['Detail']['namhoc'] . " - HK" . $data['Detail']['hocky'] . " - " . $data['Detail']['tennhom'] ?>
                            </p>
                            <button type="button" class="btn btn-alt-primary btn-sm btn-reset-invited-code"><i
                                    class="fa fa-arrows-rotate me-1"></i>Tạo mã mới</button>
                        </div>
                        <div class="block-content block-content-full text-end">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary btn-add-sv" data-bs-dismiss="modal">Thêm sinh
                        viên</button>
                </div>
                    </div>
                    <div class="tab-pane fade fade-up" id="them-file-excel" role="tabpanel"
                        aria-labelledby="them-file-excel-tab" tabindex="0">
                        <form id="form-upload" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="user_password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control form-control-alt" name="user_password"
                                    id="ps_user_group" placeholder="Nhập mật khẩu cho sinh viên!">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="js-ckeditor">Nội dung</label>
                                <input class="form-control" type="file" id="file-cau-hoi" accept=".xlsx, .xls, .csv"
                                    required>
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSetting" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <?php echo $data['Detail']['mamonhoc'] . " - " . $data['Detail']['tenmonhoc'] . " - NH" . $data['Detail']['namhoc'] . " - HK" . $data['Detail']['hocky'] . " - " . $data['Detail']['tennhom'] ?>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body content-side">
        <div class="block block-transparent pull-x pull-t mb-0">
            <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="so-settings-tab" data-bs-toggle="tab"
                        data-bs-target="#so-settings" role="tab" aria-controls="so-settings" aria-selected="true">
                        <i class="fa fa-fw fa-cog me-2"></i> Đề kiểm tra
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="so-profile-tab" data-bs-toggle="tab" data-bs-target="#so-profile"
                        role="tab" aria-controls="so-profile" aria-selected="false" tabindex="-1">
                        <i class="fa fa-fw fa-bell me-2"></i> Thông báo
                    </button>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel"
                    aria-labelledby="so-settings-tab" tabindex="0">
                    <div class="list-test px-2"></div>
                </div>
                <div class="tab-pane pull-x fade fade-up" id="so-profile" role="tabpanel"
                    aria-labelledby="so-profile-tab" tabindex="0">
                    <p class="text-center">Không có thông báo</p>
                </div>
            </div>
        </div>
    </div>
</div>