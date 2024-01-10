<?php

//####################################################
// الاتصال مع قاعده البيانات
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'news';

$Mysqli = new mysqli($hostname, $username, $password, $database);

if($Mysqli == true){
    echo '<h3>connected</h3>';
}

// تحديد قاعده البينانات
mysqli_select_db($Mysqli, $database);
//####################################################

// functions
require_once(dirname(__FILE__).'/sql_functions.php');

// models
require_once(dirname(__FILE__).'/model_user.php');
require_once(dirname(__FILE__).'/model_category.php');
require_once(dirname(__FILE__).'/model_news.php');
require_once(dirname(__FILE__).'/model_commint.php');

// $data = user_show_all();
// $data = user_show_by_email('omar@gmail.com');

$data = [
    'type'=>'user',
    'name'=>'Omar 88888',
    'email'=>'admin2@gmail.com',
    'password'=>'123123',
];



$id = 11;
$re = user_remove($id);

echo '<pre>';
print_r($re);
echo '</pre>';

