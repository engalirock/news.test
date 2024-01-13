<?php
require_once(dirname(__FILE__) . '/../main/config.php');
// التحقق من اليوزر انه مسجل دخول
$userSession = user_session();


##########################################
$page = $_GET['page'] ?? '';

$pathPage = dirname(__FILE__) . '/pages/home.php';
// استدعائات الاقسام
if ($page == 'news.show') {
    $pathPage = dirname(__FILE__) . '/pages/news.php';
} else if ($page == 'category.show') {
    $pathPage = dirname(__FILE__) . '/pages/category.php';
} else if ($page == 'search') {
    $pathPage = dirname(__FILE__) . '/pages/search.php';
} else if ($page == 'login') {
    if ($userSession) {
        header('Location: index.php');
        exit;
    }

    $pathPage = dirname(__FILE__) . '/pages/login.php';
} else if ($page == 'registr') {
    $pathPage = dirname(__FILE__) . '/pages/registr.php';
}
########################################
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="assests/favicon.ico">
    <title>موقع اخباري</title>
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Droid+Arabic+Kufi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assests/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assests/style.css" />
</head>

<body>
    <!-- BEGIN wrapper -->
    <div id="wrapper">
        <!-- BEGIN header -->
        <div id="header">
            <ul>
                <li><a href="?page=home">الرئيسية</a></li>
                <?php $categories = category_show_all(); ?>
                <?php foreach ($categories as $row) { ?>
                    <li><a href="?page=category.show&id=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
                <?php } ?>
            </ul>
            <p class="rss">
                <?php if ($userSession) { ?>
                    <span style="font-weight: bold;"><i class="fas fa-user"></i> <?= $userSession['name'] ?></span> | <a href="actions.php?action=logout">تسجيل خروج</a>
                <?php } else { ?>
                    <a href="?page=login">تسجيل الدخول</a> | <a href="?page=registr">تسجيل</a>
                <?php } ?>
            </p>
            <h1>
                <img style="max-height: 80px;" src="assests/images/logo.png" alt="" srcset="">
            </h1>
        </div>
        <!-- END header -->

        <div style="min-height: 720px;">
            <?php require_once($pathPage); ?>
        </div>

    </div>
    <!-- END wrapper -->
    <!-- BEGIN footer -->
    <div id="footer">
        <p style="text-align: center;">جميع الحقوق محفوظة</p>
    </div>
    <!-- END footer -->
</body>

</html>