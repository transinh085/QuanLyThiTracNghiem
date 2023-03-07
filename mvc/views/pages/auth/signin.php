<!-- Page Content -->
<div class="bg-image" style="background-image: url('./public/media/photos/photo24@2x.jpg');">
    <div class="row g-0 justify-content-center">
        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign In Block -->
            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                    <!-- Header -->
                    <div class="mb-2 text-center">
                        <a class="link-fx fw-bold fs-1" href="index.html">
                            <span class="text-dark">OnTest</span><span class="text-primary">VN</span>
                        </a>
                        <p class="text-uppercase fw-bold fs-sm text-muted">Đăng nhập</p>
                    </div>
                    <!-- END Header -->
                    <!-- Sign In Form -->
                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-signin" action="be_pages_auth_all.html" method="POST">
                        <div class="mb-4">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" id="login-username" name="login-username"
                                    placeholder="Nhập email">
                                <span class="input-group-text">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-lg">
                                <input type="password" class="form-control" id="login-password" name="login-password"
                                    placeholder="Nhập mật khẩu">
                                <span class="input-group-text">
                                    <i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>
                        <div
                            class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="login-remember-me"
                                    name="login-remember-me" checked>
                                <label class="form-check-label" for="login-remember-me">Remember Me</label>
                            </div>
                            <div class="fw-semibold fs-sm py-1">
                                <a href="./auth/recover">Quên mật khẩu</a>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-hero btn-primary">
                                <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Đăng nhập
                            </button>
                        </div>
                        <a class="btn btn-alt-secondary me-1 mb-3 w-100" href="<?php echo $data["authUrl"]?>">
                            <img alt="Logo" src="./public/media/svg/google-icon.svg"
                                style="height:15px;margin-right:20px">Đăng nhập với Google</a>
                    </form>
                    <!-- END Sign In Form -->
                </div>
                <div class="block-content bg-body">
                    <div class="d-flex justify-content-center text-center push">
                        <a class="item item-circle item-tiny me-1 bg-default" data-toggle="theme" data-theme="default"
                            href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xwork" data-toggle="theme"
                            data-theme="./public/css/themes/xwork.min.css" href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xmodern" data-toggle="theme"
                            data-theme="./public/css/themes/xmodern.min.css" href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xeco" data-toggle="theme"
                            data-theme="./public/css/themes/xeco.min.css" href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xsmooth" data-toggle="theme"
                            data-theme="./public/css/themes/xsmooth.min.css" href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xinspire" data-toggle="theme"
                            data-theme="./public/css/themes/xinspire.min.css" href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xdream" data-toggle="theme"
                            data-theme="./public/css/themes/xdream.min.css" href="#"></a>
                        <a class="item item-circle item-tiny me-1 bg-xpro" data-toggle="theme"
                            data-theme="./public/css/themes/xpro.min.css" href="#"></a>
                        <a class="item item-circle item-tiny bg-xplay" data-toggle="theme"
                            data-theme="./public/css/themes/xplay.min.css" href="#"></a>
                    </div>
                </div>
            </div>
            <!-- END Sign In Block -->
        </div>
    </div>
</div>
<!-- END Page Content -->