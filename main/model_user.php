<?php
##############################################################################################
// registr
function user_registr($data){
    $data['type'] = 'user';
    return user_add($data);
}

##############################################################################################
// login
function user_login($email, $password){
    if(empty($email)){
        return myResponse(false, 'الرجاء ادخال البريد الالكتروني');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return myResponse(false, 'الرجاء ادخال البريد الالكتروني بشكل صحيح');
    }
    
    // التحقق من وجود المستخدم من خلال البريد الالكتروني
    $user = user_show_by_email($email);

    if(!$user){
        return myResponse(false, 'هذا البريد الالكتروني غير مسجل لدينا');
    }

    if(empty($password)){
        return myResponse(false, 'الرجاء ادخال كلمة المرور بشكل صحيح');
    }

    if($password != $user['password']){
        return myResponse(false, 'كلمة المرور مختلفة عن المرتبطة بهذا البريد الالكتروني');
    }

    return myResponse(true, sprintf('تم تسجيل الدخول بنجاح، مرحبا بك يا %s', $user['name']), $user);
}

##############################################################################################
// show all
function user_show_all(){
    
    $query = 'SELECT * FROM `users`';

    return sql_select($query);
}

##############################################################################################
// show by id
function user_show_by_id($id){

    $query = sprintf('SELECT * FROM `users` WHERE `id`=%d', $id);

    return sql_select_one($query);
}

##############################################################################################
// show by email
function user_show_by_email($email){

    $email = sql_scan($email);
    $query = sprintf('SELECT * FROM `users` WHERE `email`="%s"', $email);

    return sql_select_one($query);
}

##############################################################################################
// add
function user_add($data){
    $type = $data['type'] ?? '';
    if(!in_array($type, ['user', 'admin'])){
        return myResponse(false, 'هذا النوع غير معروف');
    }

    $name = $data['name'] ?? '';
    if(empty($name)){
        return myResponse(false, 'الرجاء ادخال الاسم بشكل صحيح');
    }

    $email  = $data['email'] ?? '';
    if(empty($email)){
        return myResponse(false, 'الرجاء ادخال البريد الالكتروني');
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return myResponse(false, 'الرجاء ادخال البريد الالكتروني بشكل صحيح');
    }
    // التحقق من وجود المستخدم من خلال البريد الالكتروني
    if(user_show_by_email($email)){
        return myResponse(false, 'هذا البريد الالكتروني مسجل بالفعل');
    }

    $password  = $data['password'] ?? '';
    if(empty($password) || strlen($password) <= 5 || strlen($password) > 8){
        return myResponse(false, 'الرجاء ادخال كلمة المرور، وجيب ان تكون اكثر من 5 حروف او ارقام واقل من 8');
    }

    $myData = [
        'type'=>$type,
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'datetime'=>date('Y-m-d H:i:s'),
    ];

    $re = sql_insert('users', $myData);
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم ادخال اليوزر بنجاح');
}

##############################################################################################
// edit
function user_edit($id, $data){ 
    $user = user_show_by_id($id); 
    if(!$user){
        return myResponse(false, 'هذا المستخدم غير موجود');
    }

    $type = $data['type'] ?? '';
    if(!in_array($type, ['user', 'admin'])){
        return myResponse(false, 'هذا النوع غير معروف');
    }

    $name = $data['name'] ?? '';
    if(empty($name)){
        return myResponse(false, 'الرجاء ادخال الاسم بشكل صحيح');
    }

    $email  = $data['email'] ?? '';
    if(empty($email)){
        return myResponse(false, 'الرجاء ادخال البريد الالكتروني');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return myResponse(false, 'الرجاء ادخال البريد الالكتروني بشكل صحيح');
    }

    // التحقق من وجود المستخدم من خلال البريد الالكتروني
    if($user['email'] != $email && user_show_by_email($email)){
        return myResponse(false, 'هذا البريد الالكتروني مسجل بالفعل');
    }

    $myData = [
        'type'=>$type,
        'name'=>$name,
        'email'=>$email,
    ];

    $re = sql_update('users', $myData, sprintf('WHERE `id`=%d', $id)); 
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    $user = user_show_by_id($id);

    return myResponse(true, 'تم تعديل البيانات بنجاح', $user);
}

##############################################################################################
// remove
function user_remove($id){
    $user = user_show_by_id($id); 
    if(!$user){
        return myResponse(false, 'هذا المستخدم غير موجود');
    }

    $re = sql_delete('users', sprintf('WHERE `id`=%d', $id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف المستخدم بنجاح');
}