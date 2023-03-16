<div class="content content-full content-boxed">
    <!-- Hero -->
    <div class="rounded border overflow-hidden push">
        <div class="bg-image pt-9" style="background-image: url('./public/media/photos/photo19@2x.jpg');"></div>
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
                        <form action="be_pages_generic_profile_v2_edit.html" method="POST" enctype="multipart/form-data"
                            onsubmit="return false;">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-name">Họ và tên</label>
                                <input type="text" class="form-control" id="dm-profile-edit-name"
                                    name="dm-profile-edit-name" placeholder="Enter your name.." value="<?php echo $data["User"]["hoten"]?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="dm-profile-edit-email"
                                    name="dm-profile-edit-email" placeholder="Enter your email.."
                                    value="<?php echo $data["User"]["email"]?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="push">
                                    <img class="img-avatar" src="./public/media/avatars/avatar0.jpg" alt="">
                                </div>
                                <label class="form-label" for="dm-profile-edit-avatar">Choose a new avatar</label>
                                <input class="form-control" type="file" id="dm-profile-edit-avatar">
                            </div>
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
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
                        <form action="be_pages_generic_profile_v2_edit.html" method="POST" onsubmit="return false;">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-password">Current Password</label>
                                <input type="password" class="form-control" id="dm-profile-edit-password"
                                    name="dm-profile-edit-password">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="dm-profile-edit-password-new">New Password</label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password-new"
                                        name="dm-profile-edit-password-new">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="dm-profile-edit-password-new-confirm">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control"
                                        id="dm-profile-edit-password-new-confirm"
                                        name="dm-profile-edit-password-new-confirm">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Edit Account -->
</div>