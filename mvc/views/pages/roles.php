<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách nhóm quyền</h3>
            <div class="block-options">
                <a class="btn btn-hero btn-primary" href="./roles/add"><i class="fa fa-fw fa-plus me-1"></i> Thêm mới</a>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search"
                                    name="one-ecom-orders-search" placeholder="Tìm kiếm nhóm quyền..">
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
                                    <th class="text-center">Mã nhóm</th>
                                    <th>Tên nhóm</th>
                                    <th class="text-center">Số người dùng</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center fs-sm"><strong>1</strong></td>
                                    <td>Admin</td>
                                    <td class="text-center fs-sm">2</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary delete_roles" href="javascript:void(0)"
                                            data-bs-toggle="tooltip" aria-label="Delete"
                                            data-bs-original-title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center fs-sm"><strong>2</strong></td>
                                    <td>Giảng viên</td>
                                    <td class="text-center fs-sm">3</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary delete_roles" href="javascript:void(0)"
                                            data-bs-toggle="tooltip" aria-label="Delete"
                                            data-bs-original-title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center fs-sm"><strong>2</strong></td>
                                    <td>Sinh viên</td>
                                    <td class="text-center fs-sm">300</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary delete_roles" href="javascript:void(0)"
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
            </div>
        </div>
    </div>
</div>