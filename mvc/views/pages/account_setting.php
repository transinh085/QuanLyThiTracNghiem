<div class="content content-full content-boxed">
    <!-- Hero -->
    <div class="rounded border overflow-hidden push">
        <div class="bg-image pt-9" style="background-image: url('./public/media/photos/photo24@2x.jpg');"></div>
        <div class="px-4 py-3 bg-body-extra-light d-flex flex-column flex-md-row align-items-center">
            <a class="d-block img-link mt-n5" href="javascript:void(0)">
                <img class="img-avatar img-avatar128 img-avatar-thumb" src="./public/media/avatars/avatar0.jpg" alt="">
            </a>
            <div class="ms-3 flex-grow-1 text-center text-md-start my-3 my-md-0">
                <h1 class="fs-4 fw-bold mb-1"><?php echo $_SESSION['user_name'] ?></h1>
                <h2 class="fs-sm fw-medium text-muted mb-0">
                    Chỉnh sửa hồ sơ
                </h2>
            </div>
            <!-- <div class="space-x-1">
                <a href="be_pages_generic_profile_v2.html" class="btn btn-sm btn-alt-secondary space-x-1">
                    <i class="fa fa-arrow-left opacity-50"></i>
                    <span>Back to Profile</span>
                </a>
            </div> -->
        </div>
    </div>
    <!-- END Hero -->

    <!-- Edit Account -->
    <div class="block block-bordered block-rounded">
        <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
            <li class="nav-item">
                <button class="nav-link space-x-1 active" id="account-profile-tab" data-bs-toggle="tab"
                    data-bs-target="#account-profile" role="tab" aria-controls="account-profile" aria-selected="true">
                    <i class="fa fa-user-circle d-sm-none"></i>
                    <span class="d-none d-sm-inline">Hồ sơ</span>
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link space-x-1" id="account-password-tab" data-bs-toggle="tab"
                    data-bs-target="#account-password" role="tab" aria-controls="account-password"
                    aria-selected="false">
                    <i class="fa fa-asterisk d-sm-none"></i>
                    <span class="d-none d-sm-inline">Mật khẩu</span>
                </button>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="account-profile" role="tabpanel" aria-labelledby="account-profile-tab"
                tabindex="0">
                <div class="row push p-sm-2 p-lg-4">
                    <div class="offset-xl-1 col-xl-4 order-xl-1">
                        <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <form class="form-update-profile" action="be_pages_generic_profile_v2_edit.html" method="POST" enctype="multipart/form-data"
                            onsubmit="return false;">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-name">Họ và tên</label>
                                <input type="text" class="form-control" id="dm-profile-edit-name"
                                    name="dm-profile-edit-name" placeholder="Enter your name.."
                                    value="<?php echo $data["User"]["hoten"]?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="dm-profile-edit-email"
                                    name="dm-profile-edit-email" placeholder="Enter your email.."
                                    value="<?php echo $data["User"]["email"]?>">
                            </div>
                            <div class="mb-3 d-flex gap-4">
                                <label for="gender-male" class="form-label">Giới tính</label>
                                <div class="space-x-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="gender-male" name="user_gender"
                                            value="1" <?php echo $data["User"]["gioitinh"] == 1 ? "checked" : ""?>>
                                        <label class="form-check-label" for="gender-male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="gender-female"
                                            name="user_gender" value="0" <?php echo $data["User"]["gioitinh"] == 0 ? "checked" : ""?>>
                                        <label class="form-check-label" for="gender-female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="user_ngaysinh" class="form-label">Ngày sinh</label>
                                <input type="text" class="js-flatpickr form-control form-control-alt" id="user_ngaysinh"
                                    name="example-flatpickr-custom" placeholder="Ngày sinh" value="<?php echo $data["User"]["ngaysinh"]?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Ảnh đại diện</label>
                                <div class="push">
                                    <img class="img-avatar" src="./public/media/avatars/avatar0.jpg" alt="">
                                </div>
                                <label class="form-label" for="dm-profile-edit-avatar">Chọn ảnh đại diện mới</label>
                                <input class="form-control" type="file" id="dm-profile-edit-avatar">
                            </div>
                            <button type="submit" class="btn btn-alt-primary" id="update-profile">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Cập nhật hồ sơ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="account-password" role="tabpanel" aria-labelledby="account-password-tab"
                tabindex="0">
                <div class="row push p-sm-2 p-lg-4">
                    <div class="offset-xl-1 col-xl-4 order-xl-1">
                        <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <form onsubmit="return false;" class="form-change-password">
                            <div class="mb-4">
                                <label class="form-label" for="current-password">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" id="current-password"
                                    name="current-password">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="new-password">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="new-password"
                                        name="new-password">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="password-new-confirm">Xác nhận mật khẩu mới</label>
                                    <input type="password" class="form-control"
                                        id="password-new-confirm"
                                        name="password-new-confirm">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-alt-primary" id="update-password">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Cập nhật mật khẩu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Edit Account -->
</div>