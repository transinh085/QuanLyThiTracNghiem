<!-- Notifications Dropdown -->
<div data-role="tghocphan" data-action="join" class="dropdown d-inline-block">
    <button type="button" class="btn btn-alt-secondary btn-show-notifications" data-id="<?php echo $_SESSION['user_id']?>" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-bell"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" style="width: 25rem;"
        aria-labelledby="page-header-notifications-dropdown">
        <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
            Thông báo
        </div>
        <ul class="nav-items my-2 list-notifications">
            <!-- data -->
        </ul>
        <!-- <div class="p-2 border-top">
            <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
            </a>
        </div> -->
    </div>
</div>
<!-- END Notifications Dropdown -->