<div class="content">
    <div class="row items-push">
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="be_pages_ecom_orders.html">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-primary mb-1">78</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Người dùng
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">126</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Học sinh
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">350</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Giáo viên
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">89.752</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        This Month
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tất cả người dùng</h3>
            <div class="block-options">
                <button type="button" class="btn btn-primary me-2">Thêm người dùng</button>
                <div class="dropdown">
                    <button type="button" class="btn btn-alt-secondary" id="dropdown-ecom-filters"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filters
                        <i class="fa fa-angle-down ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Pending..
                            <span class="badge bg-primary rounded-pill">78</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Processing
                            <span class="badge bg-black-50 rounded-pill">12</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            For Delivery
                            <span class="badge bg-black-50 rounded-pill">20</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Canceled
                            <span class="badge bg-black-50 rounded-pill">5</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Delivered
                            <span class="badge bg-black-50 rounded-pill">280</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            All
                            <span class="badge bg-black-50 rounded-pill">19k</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content bg-body-dark">
            <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                <div class="mb-4">
                    <input type="text" class="form-control form-control-alt" id="dm-ecom-orders-search"
                        name="dm-ecom-orders-search" placeholder="Tìm kiếm người dùng...">
                </div>
            </form>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th>Họ và tên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Nhóm quyền</th>
                            <th class="text-center">Ngày tham gia</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <strong>001</strong>
                            </td>
                            <td class="fs-sm d-flex align-items-center">
                                <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg" alt="">
                                <div class="d-flex flex-column">
                                    <strong class="text-primary">Susan Day</strong>
                                    <span class="fw-normal fs-sm text-muted">client1@example.com</span>
                                </div>
                            </td>
                            <td class="text-center">Nam</td>
                            <td class="text-center">20/12/2003</td>
                            <td class="text-center">Học sinh</td>
                            <td class="text-center">01/01/0000</td>
                            <td class="text-center">
                                <span class="badge bg-success badge-pill text-uppercase fw-bold py-2 px-3">Active</span>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                    data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary" href="" data-bs-toggle="tooltip"
                                    aria-label="Delete" data-bs-original-title="Delete">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Photos Search Navigation">
                <ul class="pagination justify-content-end mt-2">
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