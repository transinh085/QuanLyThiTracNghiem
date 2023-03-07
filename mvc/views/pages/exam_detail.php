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
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Nội dung</h3>
                        <div class="block-options">
                            <button type="button" class="btn btn-primary">Xem chi tiết</button>
                        </div>
                    </div>
                    <div class="block-content">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-xl-9">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Danh sách đã thi (3/4)
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                            data-bs-placement="left" aria-label="Previous 15 Messages"
                            data-bs-original-title="Previous 15 Messages">
                            <i class="si si-arrow-left"></i>
                        </button>
                        <button type="button" class="btn-block-option js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                            data-bs-placement="left" aria-label="Next 15 Messages"
                            data-bs-original-title="Next 15 Messages">
                            <i class="si si-arrow-right"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search"
                                    name="one-ecom-orders-search" placeholder="Tìm kiếm môn học..">
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
                                    <th class="d-none d-xl-table-cell text-center">Điểm</th>
                                    <th class="d-none d-sm-table-cell text-center">Thời gian làm bài</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fs-sm d-flex align-items-center">
                                        <img class="img-avatar img-avatar48 me-3"
                                            src="./public/media/avatars/avatar0.jpg" alt="">
                                        <div class="d-flex flex-column">
                                            <strong class="text-primary">Susan Day</strong>
                                            <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-xl-table-cell text-center fs-sm">20</td>
                                    <td class="d-none d-sm-table-cell text-center fs-sm">30:45</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                            href="be_pages_ecom_order.html" data-bs-toggle="tooltip" aria-label="View"
                                            data-bs-original-title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                            href="be_pages_ecom_order.html" data-bs-toggle="tooltip" aria-label="Edit"
                                            data-bs-original-title="Edit">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
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
            </div>
        </div>
    </div>
</div>