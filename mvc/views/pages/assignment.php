<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tất cả phân công</h3>
            <div class="block-options">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-assignment" id="add_assignment"><i class="fa-regular fa-plus"></i> Thêm phân công mới</button>
            </div>
        </div>
        <div class="block-content">
            <form onsubmit="return false;">
                <div class="row mb-4 align-items-center">
                    <div class="col-9">
                        <div class="input-group">
                            <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                            <ul class="dropdown-menu mt-1">
                                <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="0">Tất cả</a></li>
                                <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="1">Giảng viên</a></li>
                                <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="2">Môn học</a></li>
                            </ul>
                            <input type="text" class="form-control" placeholder="Tìm kiếm phân công..." id="one-ecom-orders-search">
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th class="text-center">Tên giảng viên</th>
                            <th class="text-center">Môn học</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="listAssignment">
                        <tr>
                            <td class="text-center fs-sm">
                                <a class="fw-semibold" href="#">
                                    <strong>1</strong>
                                </a>
                            </td>
                            <td class="text-center">
                                Hoàng Gia Bảo
                            </td>
                            <td class="text-center">
                                <a class="fw-semibold">Hệ điều hành mã nguồn mở</a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary btn-edit-question" data-bs-toggle="modal" data-bs-target="#modal-add-assignment" aria-label="Edit" data-bs-original-title="Edit" data-id="3">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary btn-delete-question" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete" data-id="3">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Photos Search Navigation">
                <ul class="pagination pagination-sm justify-content-center mt-2" id="pagination">
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
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add-assignment" tabindex="-1" role="dialog" aria-labelledby="modal-add-assignment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <ul class="nav nav-tabs nav-tabs-alt mb-1" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="btabs-alt-static-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-home" role="tab" aria-controls="btabs-alt-static-home" aria-selected="true">
                        Thêm thủ công
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="btabs-alt-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-profile" role="tab" aria-controls="btabs-alt-static-profile" aria-selected="false">
                        Thêm từ file
                    </button>
                </li>
                <li class="nav-item ms-auto">
                    <button type="button" class="btn btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </li>
            </ul>
            <div class="modal-body block block-transparent bg-white mb-0 block-rounded">
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel" aria-labelledby="btabs-static-home-tab" tabindex="0">
                        <form method="POST" onsubmit="return false;">
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-6 d-flex flex-row">
                                        <div class="d-flex align-items-center">
                                        <label for="giang-vien" class="form-label" style="width: 100px">
                                            Giảng viên
                                        </label>
                                        </div>
                                        <select class="js-select2 form-select data-monhoc" data-tab="1" id="giang-vien" name="giang-vien" style="width: 100%;" data-placeholder="Choose one.." required>
                                            <option value=""></option>
                                            <option value="id">Trần Nhật Sinh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <h5 class="text-primary">Danh sách môn học</h5>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 100px;">Chọn</th>
                                                <th class="text-center">Mã môn học</th>
                                                <th class="text-center">Tên môn học</th>
                                                <th class="text-center">Số tín chỉ</th>
                                                <th class="text-center">Số tiết lý thuyết</th>
                                                <th class="text-center">Số tiết thực hành</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-subject">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mb-4 d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-alt-primary" id="btn_assignment"><i class="fa fa-fw fa-plus me-1"></i> Lưu phân công</button>
                                <!-- <button class="btn btn-alt-primary" id="edit_assignment"><i class="fa fa-fw fa-plus me-1"></i> Sửa phân công</button> -->
                                <input type="hidden" value="" id="question_id">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-profile" role="tabpanel" aria-labelledby="btabs-static-profile-tab" tabindex="0">
                        <form id="form-upload" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Môn học</label>
                                        <select id="monhocfile" class="js-select2 form-select data-monhoc" data-tab="2" style="width: 100%;" data-placeholder="Choose one.." required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Chương</label>
                                        <select id="chuongfile" class="js-select2 form-select data-chuong" data-tab="2" style="width: 100%;" data-placeholder="Choose one.." required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="js-ckeditor">Nội dung</label>
                                <input class="form-control" type="file" id="file-cau-hoi" accept=".docx" required>
                            </div>
                            <div class="mb-4">
                                <em>Vui lòng soạn câu hỏi theo đúng định dạng. <a href="">Tải về file mẫu Docx</a></em>
                            </div>
                            <div class="mb-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-hero btn-primary" id="btnAddExcel"><i class="fa fa-cloud-arrow-up"></i>Thêm file Excel</button>
                                <button type="submit" class="btn btn-hero btn-primary" id="nhap-file"><i class="fa fa-cloud-arrow-up"></i> Thêm vào hệ thống</button>
                            </div>
                        </form>
                        <div id="content-file"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>