<div class="bg-image" style="background-image: url('./public/media/photos/photo22@2x.jpg');">
    <div class="row g-0 bg-primary-op">
        <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
            <div class="p-3 w-100">
                <div class="mb-3 text-center">
                    <a class="link-fx fw-bold fs-1" href="index.html">
                        <span class="text-dark">Dash</span><span class="text-primary">mix</span>
                    </a>
                    <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                </div>
                <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <form class="js-validation-signin">
                            <div class="py-3">
                                <div class="mb-4">
                                    <input type="text" class="form-control form-control-lg form-control-alt"
                                        id="login-username" name="login-username" placeholder="Mã sinh viên">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-lg form-control-alt"
                                        id="login-password" name="login-password" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                    <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign In
                                </button>
                                <a class="btn btn-alt-secondary me-1 my-3 w-100" href="<?php echo $data["authUrl"]?>">
                                    <img alt="Logo" src="./public/media/svg/google-icon.svg"
                                        style="height:15px;margin-right:20px">Đăng nhập với Google</a>
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1"
                                        href="./auth/recover">
                                        <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Forgot password
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="#">
                                        <i class="fa fa-plus opacity-50 me-1"></i> New Account
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
                <p class="display-4 fw-bold text-white mb-3">
                    Welcome to the future
                </p>
                <p class="fs-lg fw-semibold text-white-75 mb-0">
                    Copyright &copy; <span data-toggle="year-copy"></span>
                </p>
            </div>
        </div>
    </div>
</div>

