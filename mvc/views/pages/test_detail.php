<style>
footer {
    display: none !important
}
</style>
<div class="row g-0 flex-md-grow-1">
    <div class="col-md-4 col-lg-4 col-xl-3 order-md-1 bg-white">
        <div class="content px-2">
            <div class="d-md-none push">
                <button type="button" class="btn w-100 btn-alt-primary" data-toggle="class-toggle"
                    data-target="#side-content" data-class="d-none">
                    Thông tin đề thi
                </button>
            </div>
            <div id="side-content" class="d-none d-md-block push">
                <h6 class="mb-3">THÔNG TIN ĐỀ THI</h6>
                <ul class="list-unstyled text-dark">
                    <li class="mb-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bottom Tooltip"><i
                            class="text-primary fa fa-file-signature me-2"></i> Tên đề: <span>Đề kiểm tra cuối kì</span>
                    </li>
                    <li class="mb-1"><i class="text-primary fa fa-clock me-2"></i> Thời gian tạo: <span>3:11
                            30/03/2023</span></li>
                </ul>
                <h6 class="mb-3">GIAO CHO</h6>
                <p class="fs-sm mb-3">Lập trình hướng đối tượng - NH2023 - HK1</p>
                <ul class="nav nav-pills nav-justified push">
                    <li class="nav-item me-1 mb-2">
                        <a class="nav-link border text-muted" href="javascript:void(0)">Nhóm 1</a>
                    </li>
                    <li class="nav-item me-1 mb-2">
                        <a class="nav-link border text-muted" href="javascript:void(0)">Nhóm 2</a>
                    </li>
                    <li class="nav-item me-1 mb-2">
                        <a class="nav-link border text-muted" href="javascript:void(0)">Nhóm 3</a>
                    </li>
                    <li class="nav-item me-1 mb-2">
                        <a class="nav-link border text-muted" href="javascript:void(0)">Nhóm 4</a>
                    </li>
                    <li class="nav-item me-1 mb-2">
                        <a class="nav-link border text-muted" href="javascript:void(0)">Nhóm 5</a>
                    </li>
                    <li class="nav-item me-1 mb-2">
                        <a class="nav-link border text-muted" href="javascript:void(0)">Nhóm 6</a>
                    </li>
                </ul>
                <h6 class="mb-3">NỘI DUNG</h6>
                <a href="javasript:void(0)" class="text-primary fw-bold"  data-bs-toggle="modal" data-bs-target="#modal-default-extra-large"><i class="fa fa-file me-2"></i>Xem chi tiết</a>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-8 col-xl-9 order-md-0 h100-scroll">
        <div class="content content-full">
            <div class="block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt align-items-center" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="bang-diem-tab" data-bs-toggle="tab"
                            data-bs-target="#bang-diem" role="tab" aria-controls="bang-diem" aria-selected="true">Bảng
                            điểm</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="thong-ke-tab" data-bs-toggle="tab" data-bs-target="#thong-ke"
                            role="tab" aria-controls="thong-ke" aria-selected="false">Thống kê</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="thong-so-cau-tab" data-bs-toggle="tab"
                            data-bs-target="#thong-so-cau" role="tab" aria-controls="thong-so-cau"
                            aria-selected="false">Thông số câu</button>
                    </li>
                    <li class="nav-item ms-auto">
                        <div class="block-options ps-3 pe-2">
                            <a name="" id="" class="btn-block-option" href="#" role="button"><i
                                    class="si si-pencil"></i></a>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="bang-diem" role="tabpanel" aria-labelledby="bang-diem-tab"
                        tabindex="0">
                        <form method="POST" onsubmit="return false;">
                            <div class="mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-alt" id="form-search-sv"
                                        name="form-search-sv" placeholder="Tìm kiếm sinh viên..">
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
                                        <th>Họ và tên</th>
                                        <th class="text-center">Điểm</th>
                                        <th class="text-center">Thời lượng</th>
                                        <th class="text-center">Thời gian nộp</th>
                                        <th class="text-center">Số lần thoát</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-sm d-flex align-items-center">
                                            <img class="img-avatar img-avatar48 me-3"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary">Trần Nhật Sinh</strong>
                                                <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">30p:45s</td>
                                        <td class="text-center">08:29 24/3/2023</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                                data-bs-toggle="tooltip" aria-label="View"
                                                data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
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
                    <div class="tab-pane" id="thong-ke" role="tabpanel" aria-labelledby="thong-ke-tab" tabindex="0">
                        <h4 class="fw-normal">Thống kê</h4>
                        <p>...</p>
                    </div>
                    <div class="tab-pane" id="thong-so-cau" role="tabpanel" aria-labelledby="thong-so-cau-tab"
                        tabindex="0">
                        <h4 class="fw-normal">Thông số câu hỏi</h4>
                        <p>...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-default-extra-large" tabindex="-1" role="dialog"
    aria-labelledby="modal-default-extra-large" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna
                    accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie
                    vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum
                    venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque
                    nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus
                    massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi
                    viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>