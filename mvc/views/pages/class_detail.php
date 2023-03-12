<div class="content">
    <div class="row">
        <div class="col-4 flex-grow-1">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="si si-magnifier"></i></span>
                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1"
                    placeholder="Lọc theo tên học sinh">
            </div>
        </div>
        <div class="col-8 d-flex align-items-center justify-content-end gap-3">
            <button type="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-file me-1"></i>Xuất danh sách
                HS</button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-file me-1"></i>Xuất bảng
                điểm</button>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#modal-block-vcenter"><i class="fa fa-fw fa-plus me-1"></i>Thêm học sinh</button>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-primary" id="dropdown-analytics-overview"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm mt-1" aria-labelledby="dropdown-analytics-overview">
                    <a class="dropdown-item" href="javascript:void(0)">Thông báo</a>
                    <a class="dropdown-item" href="javascript:void(0)">Previous Week</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">This Month</a>
                    <a class="dropdown-item" href="javascript:void(0)">Previous Month</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">LỚP 1 (2023-2024)</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <code>(Sĩ số 2)</code>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Ngày sinh</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Đề thi đã làm</th>
                                <th class="text-center" style="width: 150px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fs-sm d-flex align-items-center">
                                    <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg"
                                        alt="">
                                    <div class="d-flex flex-column">
                                        <a class="fw-semibold" href="be_pages_generic_profile.html">Susan Day</a>
                                        <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                    </div>
                                </td>
                                <td class="text-center fs-sm">Nam</td>
                                <td class="text-center fs-sm">20/12/2003</td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode"
                                            value="yes" checked>
                                    </div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-alt-secondary"
                                            data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-alt-secondary"
                                            data-bs-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
    aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent bg-white mb-0">
                <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="btabs-alt-static-home-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-alt-static-home" role="tab" aria-controls="btabs-alt-static-home"
                            aria-selected="true">
                            Thêm học sinh
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-alt-static-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-alt-static-profile" role="tab"
                            aria-controls="btabs-alt-static-profile" aria-selected="false">
                            Thêm bằng file Excel
                        </button>
                    </li>
                    <li class="nav-item ms-auto">
                        <button class="nav-link" id="btabs-alt-static-settings-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-alt-static-settings" role="tab"
                            aria-controls="btabs-alt-static-settings" aria-selected="false">
                            <i class="si si-settings"></i>
                        </button>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel"
                        aria-labelledby="btabs-static-home-tab" tabindex="0">
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="" id="" placeholder="Họ và tên">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="" id="" placeholder="Số điện thoại">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="" id="" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="js-flatpickr form-control" id="example-flatpickr-custom"
                                    name="example-flatpickr-custom" placeholder="Ngày sinh" data-date-format="d-m-Y">
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
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-profile" role="tabpanel"
                        aria-labelledby="btabs-static-profile-tab" tabindex="0">
                        <h4 class="fw-normal">Profile Content</h4>
                        <p>...</p>
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-settings" role="tabpanel"
                        aria-labelledby="btabs-static-settings-tab" tabindex="0">
                        <h4 class="fw-normal">Settings Content</h4>
                        <p>...</p>
                    </div>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>