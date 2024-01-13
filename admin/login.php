<?php
require_once(dirname(__FILE__) . '/../main/config.php'); 

if(isset($_POST['login'])){
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $reData = user_login($email, $password);
    if($reData['status']){
        header('Location: index.php');
        exit;
    }

    $_SESSION['reData'] = $reData;
}

$userSession = user_session();
if($userSession && $userSession['type'] == 'admin'){
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>

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
    <!-- summernote -->
    <link rel="stylesheet" href="assests/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            لوحة التحكم
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">سجل دخول لبدئ جلستك</p>

                <?php require_once(dirname(__FILE__) . '/includes/alerts.php'); ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="اكتب البريد الالكتروني">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="اكتب كلمة المرور">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" name="login" value="1" class="btn btn-primary btn-block">تسجيل الدخول</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assests/plugins/jquery/jquery.min.js"></script>
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
    <!-- Summernote -->
    <script src="assests/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assests/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assests/js/adminlte.min.js"></script>

</body>

</html>