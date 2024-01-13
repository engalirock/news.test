<?php 
require_once(dirname(__FILE__) . '/../main/config.php'); 
// التحقق من اليوزر انه مسجل دخول
$userSession = user_session();
if(!$userSession || $userSession['type'] != 'admin'){
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="assests/favicon.ico">
    <title>لوحة التحكم</title>

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Droid+Arabic+Kufi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assests/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assests/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assests/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assests/css/adminlte.min.css">
    <link rel="stylesheet" href="assests/css/rtl.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assests/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assests/plugins/daterangepicker/daterangepicker.css">

    <!-- jQuery -->
    <script src="assests/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed rtl">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once(dirname(__FILE__) . '/includes/navbar.php'); ?>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <?php require_once(dirname(__FILE__) . '/includes/sidebar.php'); ?>
        <!-- /.Main Sidebar Container -->

        <?php
        $page = $_GET['page'] ?? '';

        // استدعائات الاقسام
        if ($page == 'category.index') {
            require_once(dirname(__FILE__) . '/category/show.php');
        } else if ($page == 'category.add') {
            require_once(dirname(__FILE__) . '/category/add.php');
        } else if ($page == 'category.edit') {
            require_once(dirname(__FILE__) . '/category/edit.php');
        
            // استدعائات الاخبار
        } else if ($page == 'news.index') {
            require_once(dirname(__FILE__) . '/news/show.php');
        } else if ($page == 'news.add') {
            require_once(dirname(__FILE__) . '/news/add.php');
        } else if ($page == 'news.edit') {
            require_once(dirname(__FILE__) . '/news/edit.php');

            // استدعائات الاخبار
        } else if ($page == 'user.index') {
            require_once(dirname(__FILE__) . '/user/show.php');
        } else if ($page == 'user.edit') {
            require_once(dirname(__FILE__) . '/user/edit.php');

            // استدعاء الرئيسية
        } else {
            require_once(dirname(__FILE__) . '/home.php');
        }
        ?>

        <!-- jQuery UI 1.11.4 -->
        <script src="assests/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="assests/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- daterangepicker -->
        <script src="assests/plugins/moment/moment.min.js"></script>
        <script src="assests/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="assests/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Plugin Tiny ---->
        <script src="assests/plugins/tinymce/tinymce.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="assests/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assests/js/adminlte.min.js"></script>

    </div>
</body>

</html>