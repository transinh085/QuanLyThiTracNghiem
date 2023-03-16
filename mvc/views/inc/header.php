<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div>
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-alt-secondary me-1" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw opacity-50 fa-search"></i> <span class="ms-1 d-none d-sm-inline-block">Search</span>
            </button>
            <!-- END Open Search Section -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div>
            <?php include "notifications.php" ?>
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-fw fa-user-circle"></i>
                    <i class="fa fa-fw fa-angle-down d-none opacity-50 d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="bg-body-light rounded-top fw-semibold text-center p-3 border-bottom">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="./public/media/avatars/avatar0.jpg"
                            alt="">
                        <div class="pt-2">
                            <a class="fw-semibold" href="be_pages_generic_profile.html">
                                <?php echo $_SESSION['user_name'] ?>
                            </a>
                            <div class="fs-sm">Admin</div>
                        </div>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item" href="./account">
                            <i class="si si-settings me-2 fa-fw icon-dropdown-item"></i> Tài khoản
                        </a>
                        <a class="dropdown-item" href="./auth/logout">
                            <i class="si si-logout me-2 fa-fw icon-dropdown-item"></i> Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-primary">
        <div class="content-header">
            <form class="w-100" method="POST">
                <div class="input-group">
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                        <i class="fa fa-fw fa-times-circle"></i>
                    </button>
                    <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                        id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->
        <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
        <div class="content-header">
            <div class="w-100 text-center">
            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
            </div>
        </div>
        </div>
    </div>
</header>
<!-- END Header -->
<?php require_once "./mvc/models/NguoiDungModel.php"?>
<?php
if(!isset($_COOKIE['token'])){
        echo "<script>window.location = './auth/signin'</script>";
}
?>