<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo $data["Title"] ?></title>
    <meta name="description" content="Hệ thống thi trắc nghiệm trực tuyến lớn nhất Việt Nam">
    <meta name="author" content="pixelcave">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="Quản lý đề thi trắc nghiệm">
    <meta property="og:site_name" content="Quản lý đề thi trắc nghiệm">
    <meta property="og:description" content="Hệ thống thi trắc nghiệm trực tuyến lớn nhất Việt Nam">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <base href="/Quanlythitracnghiem/">
    <link rel="shortcut icon" href="./public/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./public/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./public/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->
    <!-- Stylesheets -->
    <?php
    if(isset($data["Plugin"]["datepicker"]) && $data["Plugin"]["datepicker"] == 1) {
        echo '<link rel="stylesheet" href="./public/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">';
    }
    if(isset($data["Plugin"]["flatpickr"]) && $data["Plugin"]["flatpickr"] == 1) {
        echo '<link rel="stylesheet" href="./public/js/plugins/flatpickr/flatpickr.min.css">';
    }
    if(isset($data["Plugin"]["select"]) && $data["Plugin"]["select"] == 1) {
        echo '<link rel="stylesheet" href="./public/js/plugins/select2/css/select2.min.css">';
    }
    if(isset($data["Plugin"]["sweetalert2"]) && $data["Plugin"]["sweetalert2"] == 1) {
        echo "<link rel=\"stylesheet\" href=\"./public/js/plugins/sweetalert2/sweetalert2.min.css\">\n";
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" id="css-main" href="./public/css/dashmix.css">
    <link rel="stylesheet" id="css-main" href="./public/css/custom.css">
    <script src="./public/js/lib/jquery.min.js"></script>
</head>



