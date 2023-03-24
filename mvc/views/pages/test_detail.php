<div class="content">
    <div class="row">
        <div class="col-md-5 col-xl-3">
            <div class="d-md-none push">
                <button type="button" class="btn w-100 btn-primary" data-toggle="class-toggle"
                    data-target="#one-inbox-side-nav" data-class="d-none">
                    Inbox Menu
                </button>
            </div>
            <div id="one-inbox-side-nav" class="d-none d-md-block push">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Đề thi cuối kì lần 1</h3>
                    </div>
                    <div class="block-content">
                        <ul class="fa-ul list-icons">
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-boxes"></i>
                                </span>
                                <div class="fw-semibold">Thời gian tạo</div>
                                <div class="text-muted">06/02/2023 21:08</div>
                            </li>
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-tasks"></i>
                                </span>
                                <div class="fw-semibold">Số lượt làm đề</div>
                                <div class="text-muted">72</div>
                            </li>
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-clock"></i>
                                </span>
                                <div class="fw-semibold">Hours</div>
                                <div class="text-muted">190</div>
                            </li>
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <div class="fw-semibold">Deadline</div>
                                <div class="text-muted">in 10 days</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-xl-9">
            <div class="block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt align-items-center" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="bang-diem-tab" data-bs-toggle="tab"
                            data-bs-target="#bang-diem" role="tab" aria-controls="bang-diem"
                            aria-selected="true">Bảng điểm</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="thong-ke-tab" data-bs-toggle="tab"
                            data-bs-target="#thong-ke" role="tab" aria-controls="thong-ke"
                            aria-selected="false">Thống kê</button>
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
                    <div class="tab-pane active" id="bang-diem" role="tabpanel"
                        aria-labelledby="bang-diem-tab" tabindex="0">
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
                                            <a class="btn btn-sm btn-alt-secondary"
                                                href="javascript:void(0)" data-bs-toggle="tooltip"
                                                aria-label="View" data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary"
                                                href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="Delete"
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
                    <div class="tab-pane" id="thong-ke" role="tabpanel"
                        aria-labelledby="thong-ke-tab" tabindex="0">
                        <h4 class="fw-normal">Thống kê</h4>
                        <p>...</p>
                    </div>
                    <div class="tab-pane" id="thong-so-cau" role="tabpanel"
                        aria-labelledby="thong-so-cau-tab" tabindex="0">
                        <h4 class="fw-normal">Thông số câu hỏi</h4>
                        <p>...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>