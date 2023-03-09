<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/',$path);
$page = $components[2];
?>


<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="./">
                <span class="smini-visible">
                    D<span class="opacity-75">x</span>
                </span>
                <span class="smini-hidden">
                    OnTest<span class="opacity-75">VN</span>
                </span>
            </a>
            <!-- END Logo -->
            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                    onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->
                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
                    <i class="far fa-moon" id="dark-mode-toggler"></i>
                </button>
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->
    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'dashboard') echo "active" ?>" href="./dashboard">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'question') echo "active" ?>" href="./question">
                        <i class="nav-main-link-icon si si-question"></i>
                        <span class="nav-main-link-name">Câu hỏi</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'user') echo "active" ?>" href="./user">
                        <i class="nav-main-link-icon si si-user"></i>
                        <span class="nav-main-link-name">Người dùng</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'subject') echo "active" ?>" href="./subject">
                        <i class="nav-main-link-icon si si-folder-alt"></i>
                        <span class="nav-main-link-name">Môn học</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'exam') echo "active" ?>" href="./exam">
                        <i class="nav-main-link-icon si si-docs"></i>
                        <span class="nav-main-link-name">Đề kiểm tra</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'lop') echo "active" ?>" href="./hocphan">
                        <i class="nav-main-link-icon si si-layers"></i>
                        <span class="nav-main-link-name">Nhóm học phần</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php if($page == 'roles') echo "active" ?>" href="./roles">
                        <i class="nav-main-link-icon si si-key"></i>
                        <span class="nav-main-link-name">Nhóm quyền</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">Cài đặt</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->