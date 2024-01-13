<?php
require_once(dirname(__FILE__) . '/../main/config.php');
// التحقق من اليوزر انه مسجل دخول
$userSession = user_session();
if (!$userSession) {
    header('Location: login.php');
    exit;
}

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

$reData = [];

// category
if ($action == 'category.create') {
    $reData = category_add($_POST);
} else if ($action == 'category.update') {
    $reData = category_edit($id, $_POST);
} else if ($action == 'category.delete') {
    $reData = category_remove($id);
}

// news
else if ($action == 'news.create') {
    $reData = news_add(array_merge($_POST, $_FILES));
} else if ($action == 'news.update') {
    $reData = news_edit($id, array_merge($_POST, $_FILES));
} else if ($action == 'news.delete') {
    $reData = news_remove($id);
}

// user
else if ($action == 'user.update') {
    $reData = user_edit($id, array_merge($_POST, $_FILES));
} else if ($action == 'user.delete') {
    $reData = user_remove($id);
}

// logout
else if ($action == 'logout') {
    user_logout();
    header('Location: login.php');
    exit;
}

if (!$reData['status']) {
    setOldData($_POST);
}

$_SESSION['reData'] = $reData;

header('Location: ' . $_SERVER['HTTP_REFERER']);
