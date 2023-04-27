<?php require "inc/head.php" ?>

<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-glass main-content-boxed">
        <!-- Header -->
        <header id="page-header">
            <div class="content-header">
                <div class="space-x-1 d-flex align-items-center space-x-2 animated zoomInRight">
                    <a class="link-fx fw-bold" href="home">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">SGU </span><span class="fs-4 text-primary">Test</span>
                    </a>
                </div>
                <div class="space-x-1">
                    <ul class="nav-main nav-main-horizontal nav-main-hover nav">
                        <li class="nav-main-item">
                            <a class="btn btn-hero rounded-pill btn-light px-3" data-toggle="layout"
                                data-action="dark_mode_toggle" href="javascript:void(0)">
                                <i class="fa fa-burn"></i>
                            </a>
                        </li>
                        <?php 
                        if(!isset($_SESSION['user_id'])) {
                            echo '<li class="nav-main-item">
                                <a class="btn btn-hero btn-light rounded-pill" href="auth/signin">
                                    <i class="fa fa-right-to-bracket me-2"></i>Đăng nhập
                                </a>
                            </li>';
                        } else {
                            echo '<li class="nav-main-item">
                                <a class="btn btn-hero btn-primary rounded-pill" href="dashboard">
                                    <i class="fa fa-rocket me-2"></i>Dashboard
                                </a>
                            </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </header>
        <!-- END Header -->
        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="hero bg-body-extra-light hero-bubbles hero-lg overflow-hidden">
                <div class="hero-inner">
                    <span class="hero-bubble hero-bubble-lg bg-warning" style="top: 20%; left: 10%;"></span>
                    <span class="hero-bubble bg-success" style="top: 20%; left: 80%;"></span>
                    <span class="hero-bubble hero-bubble-sm bg-xwork" style="top: 40%; left: 25%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xmodern" style="top: 10%; left: 20%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xeco" style="top: 30%; left: 90%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-danger" style="top: 35%; left: 20%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-warning" style="top: 60%; left: 35%;"></span>
                    <span class="hero-bubble bg-info" style="top: 60%; left: 80%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xdream" style="top: 75%; left: 70%;"></span>
                    <span class="hero-bubble hero-bubble-lg bg-xpro" style="top: 75%; left: 10%;"></span>
                    <span class="hero-bubble bg-xplay" style="top: 90%; left: 90%;"></span>
                    <div class="position-relative d-flex align-items-center">
                        <div class="content content-full">
                            <div class="row g-6 w-100 py-7 overflow-hidden">
                                <div
                                    class="col-md-7 order-md-last py-4 d-md-flex align-items-md-center justify-content-md-end">
                                    <img class="img-fluid animated flipInX" src="./public/media/various/landing.png"
                                        alt="Hero Promo">
                                </div>
                                <div class="col-md-5 py-4 d-flex align-items-center invisible" data-toggle="appear"
                                    data-class="animated fadeInLeft">
                                    <div class="text-center text-md-start">
                                        <h1 class="fw-bold fs-2 mb-3">
                                            Hệ thống thi và tạo đề thi trắc nghiệm online tốt nhất.
                                        </h1>
                                        <p class="text-muted fw-medium mb-4">
                                            Hỗ trợ bạn các chức năng tốt nhất để dễ dàng tạo và quản lý ngân hàng câu
                                            hỏi,
                                            đề thi trắc nghiệm, bài giảng.
                                            Tổ chức các kỳ thi online, giao bài tập về nhà trên mọi nền tảng Web,
                                            Mobile...
                                        </p>
                                        <a class="btn btn-alt-primary py-2 px-3 m-1" href="auth/signin" target="_blank">
                                            <i class="fa fa-arrow-right opacity-50 me-1"></i> Tham gia ngay
                                        </a>
                                        <a class="btn btn-alt-secondary py-2 px-3 m-1 btn--scroll-to">
                                            <i class="fa fa-arrow-down opacity-50 me-1"></i> Tìm hiểu thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Hero -->
            <!-- Section 1 -->
            <div class="position-relative bg-body-extra-light" id="section--1">
                <div class="position-absolute top-0 end-0 bottom-0 start-0 bg-body-light skew-y-1"></div>
                <div class="position-relative">
                    <div class="content content-full">
                        <div class="row g-0 justify-content-center text-center">
                            <div class="col-xl-4 invisible" data-toggle="appear" data-class="animated flipInX">
                                <div class="w-100 py-4 px-2">
                                    <div class="d-inline-block bg-body-extra-light rounded p-1 mb-4">
                                        <div class="d-inline-block bg-xinspire-light rounded p-4">
                                            <i class="fa fa-cubes fa-2x text-xinspire-dark"></i>
                                        </div>
                                    </div>
                                    <h3 class="h4 fw-bold mb-1">
                                        Lưu trạng thái khi gặp sự cố
                                    </h3>
                                    <p class="fw-medium text-dark mb-0">
                                        Tính năng Lưu đáp án khi gặp sự cố giúp người dùng bảo vệ kết quả bài kiểm tra trắc nghiệm một cách dễ dàng và tiện lợi.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 invisible" data-toggle="appear" data-class="animated flipInX">
                                <div class="w-100 py-4 px-2">
                                    <div class="d-inline-block bg-body-extra-light rounded p-1 mb-4">
                                        <div class="d-inline-block bg-xplay-lighter rounded p-4">
                                            <i class="fa fa-code fa-2x text-xplay"></i>
                                        </div>
                                    </div>
                                    <h3 class="h4 fw-bold mb-1">
                                        Tạo đề thi tự động
                                    </h3>
                                    <p class="fw-medium text-dark mb-0">
                                    Giúp nâng cao chính xác và hiệu quả của quá trình tạo đề thi, đồng thời tiết kiệm thời gian và công sức cho người dùng.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 invisible" data-toggle="appear" data-class="animated flipInX">
                                <div class="w-100 py-4 px-2">
                                    <div class="d-inline-block bg-body-extra-light rounded p-1 mb-4">
                                        <div class="d-inline-block bg-xpro-lighter rounded p-4">
                                            <i class="fa fa-rocket fa-2x text-xpro"></i>
                                        </div>
                                    </div>
                                    <h3 class="h4 fw-bold mb-1">
                                        Phân loại câu hỏi
                                    </h3>
                                    <p class="fw-medium text-dark mb-0">
                                    Đưa ra các câu hỏi phù hợp với nhu cầu của người dùng, giúp tạo ra bài kiểm tra trắc nghiệm chất lượng và hiệu quả.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Section 1 -->

            <!-- Section 2 -->
            <div class="bg-body-extra-light">
                <div class="content content-full">
                    <div class="row">
                        <div class="order-md-1 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="./public/media/various/landing_1.jpg" alt="" class="feature__img invisible"
                                data-toggle="appear" data-class="animated fadeInRight">
                        </div>
                        <div class="order-md-0 col-md-6 d-flex align-items-center">
                            <div>
                                <h3 class="h3 mb-4 fw-bolder invisible" data-toggle="appear"
                                    data-class="animated fadeInUp" data-offset="-200">
                                    Dễ dàng tạo bài thi online
                                </h3>
                                <p class="mb-4 invisible" data-toggle="appear" data-class="animated fadeInUp"
                                    data-offset="-200">Hệ thống dễ dàng tạo đề thi với nhiều tuỳ chọn, giúp giảng viên
                                    tạo
                                    đề thi nhanh chóng</p>
                                <ul class="text-dark mb-4 m-0 list-unstyled">
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="200">Tạo bài
                                        kiểm tra với nhiều dạng câu hỏi</li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="400">Câu hỏi
                                        chọn 1 kết quả</li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="600">Trả lời
                                        đoạn văn ngắn</li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="800">Trả lời
                                        bằng cách upload file (Hình ảnh, word, video)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content content-full">
                    <div class="row">
                        <div class="order-md-0 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="./public/media/various/landing_2.jpg" alt="" class="feature__img invisible"
                                data-toggle="appear" data-class="animated fadeInLeft">
                        </div>
                        <div class="order-md-1 col-md-6 d-flex align-items-center">
                            <div>
                                <h3 class="h3 mb-4 fw-bolder invisible" data-toggle="appear" data-class="animated fadeInUp"
                                    data-offset="-200">
                                    Lên trước lịch làm bài hoặc giới hạn thời gian làm bài thi
                                </h3>
                                <p class="invisible" data-toggle="appear" data-class="animated fadeInUp"
                                    data-offset="-200">
                                    Bạn có thể cài đặt thời gian để học sinh chỉ làm bài trong khung thời gian qui
                                    định:
                                </p>
                                <ul class="text-dark mb-4 m-0 list-unstyled">
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="200">Qui định thời gian cho bài làm</li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="400">Qui định thời gian có thể bắt đầu làm bài</li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="600">Qui định thời gian kết thúc hiệu lực làm bài</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content content-full">
                    <div class="row">
                        <div class="order-md-1 col-md-6 d-flex align-items-center justify-content-center">
                            <img src="./public/media/various/landing_3.jpg" alt="" class="feature__img invisible" data-toggle="appear" data-class="animated fadeInRight">
                        </div>
                        <div class="order-md-0 col-md-6 d-flex align-items-center">
                            <div>
                                <h3 class="h3 mb-4 fw-bolder invisible" data-toggle="appear" data-class="animated fadeInUp"
                                    data-offset="-200">
                                    Học sinh làm bài không cần cài đặt thêm ứng dụng
                                </h3>
                                <p class="mb-2 invisible" data-toggle="appear" data-class="animated fadeInUp"
                                    data-offset="-200">Hệ thống tạo đề thi trắc nghiệm của chúng tôi cho phép học sinh làm bài
                                    kiểm tra trực tuyến dễ dàng mà không cần cài đặt thêm ứng dụng.</p>
                                <ul class="text-dark mb-4 m-0 list-unstyled">
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="200">Bảo mật thông tin</li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="400">Giao diện làm bài kiểm tra trực quan và dễ tương tác
                                    </li>
                                    <li class="list-landing invisible" data-toggle="appear"
                                        data-class="animated fadeInUp" data-offset="-200" data-timeout="600">Giao diện tuỳ biến theo kích thước màn hình </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-body-extra-light">
                <div class="content content-full">
                    <div class="pt-7 pb-5">
                        <div class="position-relative">
                            <h2 class="fw-bold mb-2 text-center">
                                <span class="text-primary">Đội ngũ</span> phát triển
                            </h2>
                            <h3 class="h4 fw-medium text-muted text-center mb-5">
                            Tập trung vào chất lượng sản phẩm, cam kết hỗ trợ khách hàng chuyên nghiệp và nhiệt tình.
                            </h3>
                        </div>
                        <div class="row">
                            <div class="js-slider text-center" data-autoplay="true" data-dots="true" data-arrows="true"
                                data-slides-to-show="4">
                                <div class="p-3">
                                    <a class="block block-rounded bg-gd-primary text-center"
                                        href="https://github.com/transinh085">
                                        <div class="block-content block-content-full bg-gd-sea">
                                            <img class="img-avatar img-avatar-thumb"
                                                src="https://github.com/transinh085.png?size=460" alt="">
                                        </div>
                                        <div class="block-content block-content-full bg-black-10">
                                            <p class="fw-semibold text-white mb-0">Trần Nhật Sinh</p>
                                            <p class="fs-sm text-white-75 mb-0">
                                                3121410422
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3">
                                    <a class="block block-rounded bg-gd-primary text-center"
                                        href="https://github.com/hgbaodev">
                                        <div class="block-content block-content-full bg-gd-sea">
                                            <img class="img-avatar img-avatar-thumb"
                                                src="https://github.com/hgbaodev.png?size=460" alt="">
                                        </div>
                                        <div class="block-content block-content-full bg-black-10">
                                            <p class="fw-semibold text-white mb-0">Hoàng Gia Bảo</p>
                                            <p class="fs-sm text-white-75 mb-0">
                                                3121410069
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3">
                                    <a class="block block-rounded bg-gd-primary text-center"
                                        href="https://github.com/nhienau">
                                        <div class="block-content block-content-full bg-gd-sea">
                                            <img class="img-avatar img-avatar-thumb"
                                                src="https://github.com/nhienau.png?size=460" alt="">
                                        </div>
                                        <div class="block-content block-content-full bg-black-10">
                                            <p class="fw-semibold text-white mb-0">Âu Hạo Nhiên</p>
                                            <p class="fs-sm text-white-75 mb-0">
                                            3121410370
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3">
                                    <a class="block block-rounded bg-gd-primary text-center"
                                        href="https://github.com/HuySimon">
                                        <div class="block-content block-content-full bg-gd-sea">
                                            <img class="img-avatar img-avatar-thumb"
                                                src="https://github.com/HuySimon.png?size=460" alt="">
                                        </div>
                                        <div class="block-content block-content-full bg-black-10">
                                            <p class="fw-semibold text-white mb-0">Đặng Lê Anh Huy</p>
                                            <p class="fs-sm text-white-75 mb-0">
                                            3121410223
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Section 2 -->

            <!-- Section 3 -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="py-4">
                        <h2 class="fw-bold mb-2 text-center">
                            Mọi người nói gì <span class="text-primary">về chúng tôi</span>
                        </h2>
                        <h3 class="h4 fw-medium text-muted text-center mb-5">
                            Luôn đồng hành và mang lại các trải nghiệm tốt nhất cho người dùng.
                        </h3>
                    </div>
                    <!-- Slider -->
                    <div class="mb-3 slider">
                        <div class="slide slide--1">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Sgu Test là một hệ thống tạo đề thi trắc nghiệm rất tiện lợi và hiệu quả cho giáo
                                    viên và học sinh. Giao diện trực quan và dễ sử dụng, tính năng tùy chỉnh linh hoạt,
                                    kết quả đánh giá chi tiết và tính năng lưu lại và tiếp tục làm bài kiểm tra là những
                                    điểm nổi bật của hệ thống này. Ngoài ra, hệ thống còn hỗ trợ đa ngôn ngữ và đảm bảo
                                    an toàn và bảo mật thông tin của người dùng. Tôi rất hài lòng với trải nghiệm của
                                    mình khi sử dụng hệ thống này.
                                </blockquote>
                                <div class="d-flex align-items-center testimonial__author">
                                    <img src="./public/media/avatars/thanhsang.jpg" alt="" class="testimonial__photo" />
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="testimonial__name">Nguyễn Thanh Sang</span>
                                        <!-- <span class="testimonial__location">3121410069</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide slide--2">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Sử dụng nhiều công cụ trong việc dạy học, nhưng SGU Test là công cụ mình yêu thích
                                    nhất. Việc thiết kế bài kiểm tra và quản lí, đánh giá kết quả của học sinh chưa bao
                                    giờ đơn giản và hiệu quả đến vậy. Đội ngũ luôn lắng nghe góp ý để đem lại trải
                                    nghiệm tốt nhất cho người dùng. Chúc SGU Test ngày càng phát triển và nhiều giáo
                                    viên
                                    sẽ biết đến SGU Test hơn.
                                </blockquote>
                                <div class="d-flex align-items-center testimonial__author">
                                    <img src="./public/media/avatars/avtar.png" alt="" class="testimonial__photo" />
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="testimonial__name">Hoàng Gia Bảo</span>
                                        <span class="testimonial__location">3121410069</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide slide--3">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Ứng dụng SGU Test có giao diện trực quan, dễ dùng và có đầy đủ các tính năng phục vụ
                                    cho dạy và học thời đại 4.0. Ngoài ra ứng dụng luôn được cập nhật và đổi mới từng
                                    ngày theo nhu cầu của các thầy cô giáo và học sinh.
                                </blockquote>
                                <div class="d-flex align-items-center testimonial__author">
                                    <img src="./public/media/avatars/avatar0.jpg" alt="" class="testimonial__photo" />
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="testimonial__name">Trần Nhật Sinh</span>
                                        <span class="testimonial__location">3211410042</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide slide--4">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Nhờ có SGU Test mà tôi đã tiết kiệm được rất nhiều thời gian trong việc quản lý lớp
                                    học của mình. Việc soạn bài, tạo các đề thi để cho học sinh thi chưa bao giờ đơn
                                    giản đến thế. Đặc biệt các bạn tư vấn và hỗ trợ rất nhiệt tình khi mình gặp vướng
                                    mắc.
                                </blockquote>
                                <div class="d-flex align-items-center testimonial__author">
                                    <img src="./public/media/avatars/avatar0.jpg" alt="" class="testimonial__photo" />
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="testimonial__name">Âu Hạo Nhiên</span>
                                        <span class="testimonial__location">3121410055</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide slide--5">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Nhờ có SGU Test mà tôi đã tiết kiệm được rất nhiều thời gian trong việc quản lý lớp
                                    học của mình. Việc soạn bài, tạo các đề thi để cho học sinh thi chưa bao giờ đơn
                                    giản đến thế. Đặc biệt các bạn tư vấn và hỗ trợ rất nhiệt tình khi mình gặp vướng
                                    mắc.
                                </blockquote>
                                <div class="d-flex align-items-center testimonial__author">
                                    <img src="./public/media/avatars/avatar0.jpg" alt="" class="testimonial__photo" />
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="testimonial__name">Đăng Lê Anh Huy</span>
                                        <span class="testimonial__location">3121410044</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="slider__btn slider__btn--left">&larr;</button>
                        <button class="slider__btn slider__btn--right">&rarr;</button>
                        <div class="dots"></div>
                    </div>
                    <!-- END Slider -->
                </div>
            </div>
            <!-- END Section 3 -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="footer-static bg-body-extra-light">
            <div class="content py-4">
                <!-- Footer Navigation -->
                <div class="row items-push fs-sm border-bottom pt-4">
                    <div class="col-6 col-md-4">
                        <h3 class="fw-semibold">Thông tin</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold text-dark" href="#">
                                    Chính sách bảo mật
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold text-dark" href="#">
                                    Điều khoản sử dụng
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold text-dark" href="#">
                                    Hướng dẫn
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-semibold">Địa chỉ</h3>
                        <div class="fs-sm push">
                            Trường Đại học Sài Gòn<br>
                            273 An Dương Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh<br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-semibold">Kết nối</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold" href="https://www.facebook.com/hgbaodev/">
                                    <i class="fab fa-1x fa-facebook-f me-2 text-dark"></i>
                                </a>
                                <a class="fw-semibold" href="#">
                                    <i class="fab fa-1x fa-facebook-messenger text-dark"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Footer Navigation -->

                <!-- Footer Copyright -->
                <div class="row fs-sm pt-4">
                    <div class="col-md-6 offset-md-3 text-center">
                        Copyright © 2023 OnTestVN. All rights reserved.
                    </div>
                </div>
                <!-- END Footer Copyright -->
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <?php require "inc/script.php"?>
</body>

</html>