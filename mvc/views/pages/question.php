<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">All Question</h3>
            <div class="block-options">
                <a name="" id="" class="btn btn-primary ms-3" href="./question/add" role="button">Add new</a>
            </div>
        </div>
        <div class="block-content">
            <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                <div class="row mb-4 align-items-center">
                    <div class="col-10">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search"
                                name="one-ecom-orders-search" placeholder="Search all questions..">
                            <span class="input-group-text bg-body border-0">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="dropdown d-flex justify-content-end">
                            <button type="button" class="btn btn-alt-primary" id="dropdown-ecom-filters"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filters <i class="fa fa-angle-down ms-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters"
                                style="">
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Pending..
                                    <span class="badge bg-black-50 rounded-pill">35</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Processing
                                    <span class="badge bg-warning rounded-pill">15</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th>Nội dung câu hỏi</th>
                            <th class="d-none d-sm-table-cell">Môn học</th>
                            <th class="d-none d-xl-table-cell">Độ khó</th>
                            <th class="d-none d-xl-table-cell text-center">Đáp án</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fs-sm">
                                <a class="fw-semibold" href="#">
                                    <strong>0001</strong>
                                </a>
                            </td>
                            <td>Lập trình hướng đối tượng là gì ?</td>
                            <td class="d-none d-xl-table-cell fs-sm">
                                <a class="fw-semibold" href="be_pages_ecom_customer.html">Lập trình hướng đối tượng</a>
                            </td>
                            <td class="d-none d-sm-table-cell fs-sm">
                                <strong>Cơ bản</strong>
                            </td>
                            <td class="d-none d-xl-table-cell text-center fs-sm">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">Show all <i
                                        class="fa fa-angle-down ms-1"></i></button>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="#"
                                    data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                    data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="tbl-collapse">
                            <td colspan="6">
                                <div class="collapse" id="collapseExample">
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="rounded p-2">Lập
                                                    trình hướng đối tượng là phương pháp đặt trọng tâm vào các đối
                                                    tượng, nó không cho phép dữ liệu chuyển động một cách tự do trong
                                                    hệ
                                                    thống</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="rounded p-2">Lập
                                                    trình hướng đối tượng là
                                                    phương pháp lập trình cơ bản gần với mã máy</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="rounded p-2">Lập trình hướng đối tượng là
                                                    phương pháp mới của lập trình máy tính, chia chương trình thành các
                                                    hàm;
                                                    quan tâm đến chức năng của hệ thống.</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="rounded p-2">
                                                    Lập trình hướng đối tượng là
                                                    phương pháp đặt trọng tâm vào các chức năng, cấu trúc chương trình
                                                    được
                                                    xây dựng theo cách tiếp cận hướng chức năng.
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center fs-sm">
                                <a class="fw-semibold" href="#">
                                    <strong>0001</strong>
                                </a>
                            </td>
                            <td>OOP là viết tắt của:</td>
                            <td class="d-none d-xl-table-cell fs-sm">
                                <a class="fw-semibold" href="be_pages_ecom_customer.html">Lập trình java</a>
                            </td>
                            <td class="d-none d-sm-table-cell fs-sm">
                                <strong>Cơ bản</strong>
                            </td>
                            <td class="d-none d-xl-table-cell text-center fs-sm">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1" aria-expanded="false"
                                    aria-controls="collapseExample1">Show all <i
                                        class="fa fa-angle-down ms-1"></i></button>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="#"
                                    data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                                    data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="tbl-collapse">
                            <td colspan="6">
                                <div class="collapse" id="collapseExample1">
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="rounded p-1 m-0">A. Object Open Programming</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="rounded p-1 m-0">B. Open Object Programming</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="rounded p-1 m-0">C. Object Oriented Programming.</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="rounded p-1 m-0">
                                                    D. Object Oriented Proccessing.
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
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