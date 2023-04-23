<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div>
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-alt-secondary me-1 d-lg-none" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <button type="button" class="btn btn-alt-secondary me-1 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Sidebar -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-alt-secondary me-1" id="page-header-themes-dropdown"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg p-0" aria-labelledby="page-header-themes-dropdown">
                    <div class="p-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            Màu sắc
                        </h5>
                    </div>
                    <div class="p-3">
                        <div class="row g-0 text-center">
                            <div class="col-2">
                                <a class="text-default" data-toggle="theme" data-theme="default"
                                    href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-xwork" data-toggle="theme"
                                    data-theme="./public/css/themes/xwork.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-xplay" data-toggle="theme"
                                    data-theme="./public/css/themes/xplay.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-xeco" data-toggle="theme"
                                    data-theme="./public/css/themes/xeco.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-xsmooth" data-toggle="theme"
                                    data-theme="./public/css/themes/xsmooth.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-xinspire" data-toggle="theme"
                                    data-theme="./public/css/themes/xinspire.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                        <span class="avatar-Account">
                            <img class="img-avatar img-avatar48 img-avatar-thumb"
                                src="./public/media/avatars/<?php echo $_SESSION["avatar"] == '' ? "avatar2.jpg" : $_SESSION["avatar"] ?>"
                                alt="">
                        </span>
                        <div class="pt-2 load-nameAccount">
                            <a class="fw-semibold ">
                                <?php echo $_SESSION['user_name'] ?>
                            </a>
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