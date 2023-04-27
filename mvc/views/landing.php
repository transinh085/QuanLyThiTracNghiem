<?php require "inc/head.php" ?>
<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-glass main-content-boxed">
        <!-- Header -->
        <header id="page-header">
            <div class="content-header">
                <div class="space-x-1 d-flex align-items-center space-x-2">
                    <a class="link-fx fw-bold" href="home">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">SGU Test</span><span class="fs-4 text-primary"></span>
                    </a>
                    <span class="d-inline-block fs-xs fw-medium bg-primary-dark text-white rounded-pill py-1 px-2">5.4</span>
                </div>
                <div class="space-x-1">
                    <ul class="nav-main nav-main-horizontal nav-main-hover nav">
                        <li class="nav-main-item">
                            <a class="btn btn-alt-secondary px-3" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
                                <i class="fa fa-burn"></i>
                            </a>
                        </li>
                        <?php 
                        if(!isset($_SESSION['user_id'])) {
                            echo '<li class="nav-main-item">
                                <a class="btn btn-light" href="auth/signin">
                                    Đăng nhập
                                </a>
                            </li>';
                        } else {
                            echo '<li class="nav-main-item">
                                <a class="btn btn-primary" href="dashboard">
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
            <div class="hero hero-lg bg-body-extra-light overflow-hidden">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="row g-6 w-100 py-7 overflow-hidden">
                            <div class="col-md-7 order-md-last py-4 d-md-flex align-items-md-center justify-content-md-end">
                                <img class="img-fluid" src="./public/media/various/landing-promo-hero.png" alt="Hero Promo">
                            </div>
                            <div class="col-md-5 py-4 d-flex align-items-center">
                                <div class="text-center text-md-start">
                                    <h1 class="fw-bold fs-2 mb-3">
                                    Hệ thống thi và tạo đề thi trắc nghiệm online tốt nhất.
                                    </h1>
                                    <p class="text-dark fw-medium mb-4">
                                    Hỗ trợ bạn các chức năng tốt nhất để dễ dàng tạo và quản lý ngân hàng câu hỏi, đề thi trắc nghiệm, bài giảng.
                                    Tổ chức các kỳ thi online, giao bài tập về nhà trên mọi nền tảng Web, Mobile...
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
            <!-- END Hero -->

            <!-- Section 1 -->
            <div class="bg-body-light" id="section--1">
                <div class="content content-full">
                    <h2 class="mt-5 mb-3 text-center">
                        Trắc nghiệm thông minh
                    </h2>
                    <div class="row g-0 justify-content-center text-center mb-5">
                        <div class="col-xl-4">
                        <div class="w-100 py-4">
                            <div class="d-inline-block bg-body-extra-light rounded p-1 mb-4">
                            <div class="d-inline-block bg-corporate-lighter rounded p-4">
                                <i class="fa fa-cubes fa-2x text-corporate"></i>
                            </div>
                            </div>
                            <h3 class="h4 fw-bold mb-1">
                            Đa dạng nội dung
                            </h3>
                            <p class="fw-medium text-dark mb-0">
                            Cung cấp đa dạng nội dung các câu hỏi trắc nghiệm thuộc nhiều lĩnh vực khác nhau.
                            </p>
                        </div>
                        </div>
                        <div class="col-xl-4">
                        <div class="w-100 py-4">
                            <div class="d-inline-block bg-body-extra-light rounded p-1 mb-4">
                            <div class="d-inline-block bg-pulse-lighter rounded p-4">
                                <i class="fa fa-code fa-2x text-pulse"></i>
                            </div>
                            </div>
                            <h3 class="h4 fw-bold mb-1">
                            Ma trận câu hỏi
                            </h3>
                            <p class="fw-medium text-dark mb-0">
                                Hệ thống sẽ dựa vào ma trận câu hỏi phong phú để tự tổng hợp thành đề trắc nghiệm.
                            </p>
                        </div>
                        </div>
                        <div class="col-xl-4">
                        <div class="w-100 py-4">
                            <div class="d-inline-block bg-body-extra-light rounded p-1 mb-4">
                            <div class="d-inline-block bg-elegance-lighter rounded p-4">
                                <i class="fa fa-rocket fa-2x text-elegance"></i>
                            </div>
                            </div>
                            <h3 class="h4 fw-bold mb-1">
                                Đáp án chi tiết
                            </h3>
                            <p class="fw-medium text-dark mb-0">
                                Sau khi hoàn thành bài kiểm tra trắc nghiệm hệ thống sẽ thông báo số điểm đạt được kèm lời giải chi tiết.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Section 1 -->

            <!-- Section 2 -->
            <div class="bg-body-extra-light">
                <div class="content content-full">
                    <div class="content content-full">
                        <div class="row">
                            <div class="order-md-1 col-md-6 d-flex align-items-center justify-content-center py-5">
                                <img src="./public/media/various/promo-questions.png" alt="" class="feature__img">
                            </div>
                            <div class="order-md-0 col-md-6 d-flex align-items-center">
                                <div>
                                    <h2 class="h2 mb-2">
                                        Dễ dàng tạo bài thi online với nhiều dạng câu hỏi
                                    </h2>
                                    <p class=" text-dark mb-4">
                                        <i class="fa-solid fa-circle-check"></i> Tạo bài kiểm tra với nhiều dạng câu hỏi

                                        <br> <i class="fa-solid fa-circle-check"></i> Câu hỏi chọn 1 kết quả

                                        <br> <i class="fa-solid fa-circle-check"></i> Trả lời đoạn văn ngắn

                                        <br> <i class="fa-solid fa-circle-check"></i> Trả lời bằng cách upload file (Hình ảnh, word, video)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content content-full">
                        <div class="row">
                            <div class="order-md-0 col-md-6 d-flex align-items-center justify-content-center py-5">
                                <img src="./public/media/various/promo-create-test.png" alt="" class="feature__img">
                            </div>
                            <div class="order-md-1 col-md-6 d-flex align-items-center">
                                <div>
                                    <h2 class="h1 mb-2">
                                        Lên trước lịch làm bài hoặc giới hạn thời gian làm bài thi
                                    </h2>
                                    <p class=" text-dark mb-4">
                                        <!-- <i class="fa-sharp fa-solid fa-circle-check"></i> -->
                                        Bạn có thể cài đặt thời gian để học sinh chỉ làm bài trong khung thời gian qui định:
                                        <br> <i class="fa-solid fa-circle-check"></i> Qui định thời gian cho bài làm ( 10’, 15’, 45’...)
                                        <br> <i class="fa-solid fa-circle-check"></i> Qui định thời gian có thể bắt đầu làm bài
                                        <br> <i class="fa-solid fa-circle-check"></i> Qui định thời gian kết thúc hiệu lực làm bài
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content content-full">
                    <div class="row">
                            <div class="order-md-1 col-md-6 d-flex align-items-center justify-content-center py-5">
                                <img src="./public/media/various/promo-users.png" alt="" class="feature__img">
                            </div>
                            <div class="order-md-0 col-md-6 d-flex align-items-center">
                                <div>
                                    <h2 class="h1 mb-2">
                                        Học sinh làm bài không cần cài đặt thêm ứng dụng
                                    </h2>
                                    <p class=" text-dark mb-4">
                                        <i class="fa-solid fa-circle-check"></i> Học sinh dễ dàng truy cập và làm bài thi mà không cần cài đặt thêm ứng dụng
                                        <br> <i class="fa-solid fa-circle-check"></i> Giao diện làm bài kiểm tra trực quan và dễ tương tác
                                        <br> <i class="fa-solid fa-circle-check"></i> Giao diện tuỳ biến theo kích thước màn hình mà không làm thay đổi chất lượng hình ảnh
                                    </p>
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
                        <h2 class="mb-2 text-center">
                            Mọi người nói gì về chúng tôi
                        </h2>
                        <h3 class="text-dark mb-0 text-center">
                            Luôn đồng hành và mang lại các trải nghiệm tốt nhất cho người dùng.
                        </h3>
                    </div>
                    <!-- Slider -->
                    <div class="mb-3 slider">
                        <div class="slide slide--1">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Sử dụng nhiều công cụ trong việc dạy học, nhưng OnTest VN là công cụ mình yêu thích nhất. Việc thiết kế bài kiểm tra và quản lí, đánh giá kết quả của học sinh chưa bao giờ đơn giản và hiệu quả đến vậy. Đội ngũ luôn lắng nghe góp ý để đem lại trải nghiệm tốt nhất cho người dùng. Chúc OnTest ngày càng phát triển và nhiều giáo viên sẽ biết đến OnTest hơn.
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
                        <div class="slide slide--2">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Ứng dụng OnTest VN có giao diện trực quan, dễ dùng và có đầy đủ các tính năng phục vụ cho dạy và học thời đại 4.0. Ngoài ra ứng dụng luôn được cập nhật và đổi mới từng ngày theo nhu cầu của các thầy cô giáo và học sinh.
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
                        <div class="slide slide--3">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Nhờ có OnTest VN mà tôi đã tiết kiệm được rất nhiều thời gian trong việc quản lý lớp học của mình. Việc soạn bài, tạo các đề thi để cho học sinh thi chưa bao giờ đơn giản đến thế. Đặc biệt các bạn tư vấn và hỗ trợ rất nhiệt tình khi mình gặp vướng mắc.
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
                        <div class="slide slide--3">
                            <div class="testimonial">
                                <blockquote class="testimonial__text">
                                    Nhờ có OnTest VN mà tôi đã tiết kiệm được rất nhiều thời gian trong việc quản lý lớp học của mình. Việc soạn bài, tạo các đề thi để cho học sinh thi chưa bao giờ đơn giản đến thế. Đặc biệt các bạn tư vấn và hỗ trợ rất nhiệt tình khi mình gặp vướng mắc.
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