<?php
require_once(dirname(__FILE__) . '/../main/config.php');

// التحقق من اليوزر انه مسجل دخول
$userSession = user_session();


$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

$reData = [];
$extra = '';

// category
if ($action == 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $reData = user_login($email, $password);
    if($reData['status']){
        // لو كان بيحاول يضيف تعليق على خبر قبل ما يسجل دخول
        // يقوم بتحويلة لنفس الخبر
        if(isset($_SESSION['last_viset_news_id']) && $_SESSION['last_viset_news_id']){
            $news_id = $_SESSION['last_viset_news_id'];
            unset($_SESSION['last_viset_news_id']);
            header('Location: index.php?page=news.show&id='.$news_id.'#comment-add');
            exit;
        }

        header('Location: index.php');
        exit;
    }

} else if ($action == 'registr') {
    $reData = user_registr($_POST);
    if($reData['status']){
        // لو كان بيحاول يضيف تعليق على خبر قبل ما يسجل حساب جديد
        // يقوم بتحويلة لنفس الخبر
        if(isset($_SESSION['last_viset_news_id']) && $_SESSION['last_viset_news_id']){
            $news_id = $_SESSION['last_viset_news_id'];
            unset($_SESSION['last_viset_news_id']);
            header('Location: index.php?page=news.show&id='.$news_id.'#comment-add');
            exit;
        }

        header('Location: index.php');
        exit;
    }
} 

else if ($action == 'comment.add') {
    if(!$userSession){
        $_SESSION['last_viset_news_id'] = $_POST['news_id'] ?? null;
        header('Location: index.php?page=login');
        exit;
    }

    $reData = comment_add($_POST);
    $extra = '#comment-add';
} 


// logout
else if ($action == 'logout') {
    user_logout();
    header('Location: index.php');
    exit;
}

if (!$reData['status']) {
    setOldData($_POST);
}

$_SESSION['reData'] = $reData;

header('Location: ' . $_SERVER['HTTP_REFERER'] . $extra);
exit;
