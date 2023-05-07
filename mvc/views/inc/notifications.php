<!-- Notifications Dropdown -->
<div class="dropdown d-inline-block">
    <button data-role="tghocphan" data-action="join" type="button" class="btn btn-alt-secondary btn-show-notifications" data-id="<?php echo $_SESSION['user_id']?>" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-bell"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">
        <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
            Thông báo
        </div>
        <ul  class="nav-items my-2 list-notifications">
            <li>
                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                        <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">App was updated to v5.6!</div>
                        <div class="text-muted">3 min ago</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                        <i class="fa fa-fw fa-user-plus text-info"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">New Subscriber was added! You now have 2580!</div>
                        <div class="text-muted">10 min ago</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                        <i class="fa fa-fw fa-times-circle text-danger"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">Server backup failed to complete!</div>
                        <div class="text-muted">30 min ago</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                        <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">You are running out of space. Please consider
                            upgrading your plan.</div>
                        <div class="text-muted">1 hour ago</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                        <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">New Sale! + $30</div>
                        <div class="text-muted">2 hours ago</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="p-2 border-top">
            <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
            </a>
        </div>
    </div>
</div>
<!-- END Notifications Dropdown -->