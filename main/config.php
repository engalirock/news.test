<?php

session_start();
setlocale(LC_TIME, 'ar_AE.utf8');
//####################################################
// الاتصال مع قاعده البيانات
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'news';

$Mysqli = new mysqli($hostname, $username, $password, $database);

// تحديد قاعده البينانات
mysqli_select_db($Mysqli, $database);
//####################################################

// functions
require_once(dirname(__FILE__) . '/functions.php');
require_once(dirname(__FILE__) . '/sql_functions.php');

// models
require_once(dirname(__FILE__) . '/model_user.php');
require_once(dirname(__FILE__) . '/model_category.php');
require_once(dirname(__FILE__) . '/model_news.php');
require_once(dirname(__FILE__) . '/model_commint.php');