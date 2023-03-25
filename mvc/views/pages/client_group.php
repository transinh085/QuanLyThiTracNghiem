<div class="content">
    <form onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Đang giảng dạy</button>
                    <ul class="dropdown-menu mt-1">
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="1">Đang giảng
                                dạy</a></li>
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="0">Đã ẩn</a>
                        </li>
                        <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="2">Tất cả</a>
                        </li>
                    </ul>
                    <input type="text" class="form-control" placeholder="Tìm kiếm nhóm..." id="form-search-group">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <button type="button" class="btn btn-hero btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-join-group"><i class="fa fa-fw fa-plus me-1"></i> Thêm nhóm</button>
            </div>
        </div>
    </form>
    <div class="row items-push" id="list-groups">
    </div>
</div>

<div class="modal fade" id="modal-join-group" tabindex="-1" role="dialog" aria-labelledby="modal-join-group"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tham gia nhóm học phần</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="mb-3">
                        <label for="" class="form-label">Mã mời</label>
                        <input type="text" class="form-control form-control-alt" name="mamoi" id="mamoi"
                            placeholder="Nhập mã mời">
                    </div>
                    <p class="form-text text-muted">Đề nghị giảng viên của bạn cung cấp mã lớp rồi
                        nhập mã đó vào đây.</p>
                    <p class="form-text text-muted">Cách đăng nhập bằng mã lớp học<br>
                        - Sử dụng tài khoản được cấp phép <br>
                        - Sử dụng mã lớp học gồm 7 chữ cái hoặc số, không có dấu cách hoặc ký hiệu
                    </p>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-sm btn-primary btn-join-group">Tham gia nhóm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Lập trình Java - NH2023 - HK2 - Nhóm 2</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body content-side">
        <div class="block block-transparent pull-x pull-t mb-0">
            <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="so-settings-tab" data-bs-toggle="tab"
                        data-bs-target="#so-settings" role="tab" aria-controls="so-settings" aria-selected="true">
                        <i class="fa fa-fw fa-cog"></i>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="so-people-tab" data-bs-toggle="tab" data-bs-target="#so-people"
                        role="tab" aria-controls="so-people" aria-selected="false" tabindex="-1">
                        <i class="far fa-fw fa-user-circle"></i>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="so-profile-tab" data-bs-toggle="tab" data-bs-target="#so-profile"
                        role="tab" aria-controls="so-profile" aria-selected="false" tabindex="-1">
                        <i class="far fa-fw fa-edit"></i>
                    </button>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel"
                    aria-labelledby="so-settings-tab" tabindex="0">
                    <div class="block mb-0">
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase fs-sm fw-bold">Color Themes</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm text-center">
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-default active"
                                        data-toggle="theme" data-theme="default" href="#">
                                        Default
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xwork"
                                        data-toggle="theme" data-theme="./public/css/themes/xwork.min-5.6.css"
                                        href="#">
                                        xWork
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xmodern"
                                        data-toggle="theme" data-theme="./public/css/themes/xmodern.min-5.6.css"
                                        href="#">
                                        xModern
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xeco" data-toggle="theme"
                                        data-theme="./public/css/themes/xeco.min-5.6.css" href="#">
                                        xEco
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xsmooth"
                                        data-toggle="theme" data-theme="./public/css/themes/xsmooth.min-5.6.css"
                                        href="#">
                                        xSmooth
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xinspire"
                                        data-toggle="theme" data-theme="./public/css/themes/xinspire.min-5.6.css"
                                        href="#">
                                        xInspire
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xdream"
                                        data-toggle="theme" data-theme="./public/css/themes/xdream.min-5.6.css"
                                        href="#">
                                        xDream
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xpro" data-toggle="theme"
                                        data-theme="./public/css/themes/xpro.min-5.6.css" href="#">
                                        xPro
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white fs-sm fw-semibold bg-xplay"
                                        data-toggle="theme" data-theme="./public/css/themes/xplay.min-5.6.css"
                                        href="#">
                                        xPlay
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark"
                                        href="be_ui_color_themes.html">All Color Themes</a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase fs-sm fw-bold">Sidebar</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm text-center">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase fs-sm fw-bold">Header</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm text-center mb-2">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="header_style_dark" href="javascript:void(0)">Dark</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="header_style_light" href="javascript:void(0)">Light</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="header_mode_static" href="javascript:void(0)">Static</a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase fs-sm fw-bold">Content</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm text-center">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
                                </div>
                                <div class="col-12 mb-1">
                                    <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout"
                                        data-action="content_layout_full_width" href="javascript:void(0)">Full
                                        Width</a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full border-top">
                            <a class="btn w-100 btn-alt-primary" href="be_layout_api.html">
                                <i class="fa fa-fw fa-flask me-1"></i> Layout API
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane pull-x fade fade-up" id="so-people" role="tabpanel"
                    aria-labelledby="so-people-tab" tabindex="0">
                    <div class="block mb-0">
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase fs-sm fw-bold">Bạn cùng nhóm</span>
                        </div>
                        <div class="block-content">
                            <ul class="nav-items">
                                <li>
                                    <a class="d-flex py-2" href="be_pages_generic_profile.html">
                                        <div class="flex-shrink-0 mx-3 overlay-container">
                                            <img class="img-avatar img-avatar48"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <span
                                                class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold">Judy Ford</div>
                                            <div class="fs-sm text-muted">Photographer</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex py-2" href="be_pages_generic_profile.html">
                                        <div class="flex-shrink-0 mx-3 overlay-container">
                                            <img class="img-avatar img-avatar48"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <span
                                                class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold">David Fuller</div>
                                            <div class="fw-normal fs-sm text-muted">Web Designer</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex py-2" href="be_pages_generic_profile.html">
                                        <div class="flex-shrink-0 mx-3 overlay-container">
                                            <img class="img-avatar img-avatar48"
                                                src="./public/media/avatars/avatar0.jpg" alt="">
                                            <span
                                                class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold">Alice Moore</div>
                                            <div class="fw-normal fs-sm text-muted">Web Developer</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane pull-x fade fade-up" id="so-profile" role="tabpanel"
                    aria-labelledby="so-profile-tab" tabindex="0">
                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                        <div class="block mb-0">
                            <div class="block-content block-content-sm block-content-full bg-body">
                                <span class="text-uppercase fs-sm fw-bold">Personal</span>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="mb-4">
                                    <label class="form-label">Username</label>
                                    <input type="text" readonly="" class="form-control"
                                        id="so-profile-username-static" value="Admin">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="so-profile-name">Name</label>
                                    <input type="text" class="form-control" id="so-profile-name"
                                        name="so-profile-name" value="George Taylor">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="so-profile-email">Email</label>
                                    <input type="email" class="form-control" id="so-profile-email"
                                        name="so-profile-email" value="g.taylor@example.com">
                                </div>
                            </div>
                            <div class="block-content block-content-sm block-content-full bg-body">
                                <span class="text-uppercase fs-sm fw-bold">Password Update</span>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="mb-4">
                                    <label class="form-label" for="so-profile-password">Current Password</label>
                                    <input type="password" class="form-control" id="so-profile-password"
                                        name="so-profile-password">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="so-profile-new-password">New Password</label>
                                    <input type="password" class="form-control" id="so-profile-new-password"
                                        name="so-profile-new-password">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="so-profile-new-password-confirm">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" id="so-profile-new-password-confirm"
                                        name="so-profile-new-password-confirm">
                                </div>
                            </div>
                            <div class="block-content block-content-sm block-content-full bg-body">
                                <span class="text-uppercase fs-sm fw-bold">Options</span>
                            </div>
                            <div class="block-content">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="so-settings-status"
                                        name="so-settings-status">
                                    <label class="form-check-label fw-semibold" for="so-settings-status">Online
                                        Status</label>
                                </div>
                                <p class="text-muted fs-sm">
                                    Make your online status visible to other users of your app
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="so-settings-notifications" name="so-settings-notifications">
                                    <label class="form-check-label fw-semibold"
                                        for="so-settings-notifications">Notifications</label>
                                </div>
                                <p class="text-muted fs-sm">
                                    Receive desktop notifications regarding your projects and sales
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="so-settings-updates" name="so-settings-updates">
                                    <label class="form-check-label fw-semibold" for="so-settings-updates">Auto
                                        Updates</label>
                                </div>
                                <p class="text-muted fs-sm">
                                    If enabled, we will keep all your applications and servers up to date with the
                                    most recent features automatically
                                </p>
                            </div>
                            <div class="block-content block-content-full border-top">
                                <button type="submit" class="btn w-100 btn-alt-primary">
                                    <i class="fa fa-fw fa-save me-1 opacity-50"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>