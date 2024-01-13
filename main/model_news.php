<?php

##############################################################################################
// show all
function news_show_all($limit=100){
    
    $query = sprintf('SELECT * FROM `news` LIMIT %d', $limit);

    return sql_select($query);
}
##############################################################################################
// show all
function news_show_by_category_id($category_id){
    
    $query = sprintf('SELECT * FROM `news` WHERE `category_id`=%d', $category_id);

    return sql_select($query);
}

##############################################################################################
// show by id
function news_show_by_id($id){

    $query = sprintf('SELECT * FROM `news` WHERE `id`=%d', $id);

    return sql_select_one($query);
}

##############################################################################################
// show by title
function news_show_by_title($title){

    $title = sql_scan($title);
    $query = sprintf('SELECT * FROM `news` WHERE `title`="%s"', $title);

    return sql_select_one($query);
}
##############################################################################################
// show by title
function news_show_all_by_search($q){

    $q = sql_scan($q);
    $query = sprintf('SELECT * FROM `news` WHERE `title` LIKE "%s"', '%'.$q.'%');

    return sql_select($query);
}
##############################################################################################
// get count all by user id
function news_get_count_by_user_id($user_id){
    
    $query = sprintf('SELECT COUNT(*) AS `count` FROM `news` WHERE `user_id`=%d', $user_id);
    $data = sql_select_one($query);

    return $data['count'] ?? 0;
}
##############################################################################################
// add
function news_add($data){

    $category_id = $data['category_id'] ?? '';
    if(empty($category_id)){
        return myResponse(false, 'الرجاء اختيار القسم');
    }

    $category = category_show_by_id($category_id);
    if(!$category){
        return myResponse(false, 'هذا القسم غير موجود');
    }
    
    $title = $data['title'] ?? '';
    if(empty($title)){
        return myResponse(false, 'الرجاء ادخال العنوان بشكل صحيح');
    }

    if(news_show_by_title($title)){
        return myResponse(false, 'هذا العنوان مستخدم بالفعل في اخبر آخر');
    }

    $description = $data['description'] ?? '';
    if(empty($description)){
        return myResponse(false, 'الرجاء ادخال الوصف بشكل صحيح');
    }

    $content = $data['content'] ?? '';
    if(empty($content)){
        return myResponse(false, 'الرجاء ادخال الخبر بشكل صحيح');
    }
    
    $image = null;
    if(isset($data['image']) && $data['image']['name']){
        $uploaddir = getcwd().'/../front/uploads/';
        $ext = pathinfo($data['image']['name'], PATHINFO_EXTENSION);
        $image = md5(uniqid().rand(1000,9999)) . '.'.$ext;
        $isUploaded = move_uploaded_file($data['image']['tmp_name'], $uploaddir.$image);
        if(!$isUploaded){
            return myResponse(false, 'فشل عملية رفع الصورة');
        }
    }

    $user = user_session();
    $user_id = $user['id'];

    $myData = [
        'user_id'=>$user_id,
        'category_id'=>$category_id,
        'title'=>sql_scan($title),
        'description'=>sql_scan($description),
        'content'=>sql_scan($content),
        'image'=>$image,
        'datetime'=>date('Y-m-d H:i:s'),
    ];

    $re = sql_insert('news', $myData);
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم ادخال الخبر بنجاح');
}

##############################################################################################
// edit
function news_edit($id, $data){ 

    $news = news_show_by_id($id); 

    if(!$news){
        return myResponse(false, 'هذا الخبر غير موجود');
    }

    $category_id = $data['category_id'] ?? '';
    if(empty($category_id)){
        return myResponse(false, 'الرجاء اختيار القسم');
    }

    $category = category_show_by_id($category_id);
    if(!$category){
        return myResponse(false, 'هذا القسم غير موجود');
    }
    
    $title = $data['title'] ?? '';
    if(empty($title)){
        return myResponse(false, 'الرجاء ادخال العنوان بشكل صحيح');
    }

    if($news['title'] != $title && news_show_by_title($title)){
        return myResponse(false, 'هذا العنوان مستخدم بالفعل في اخبر آخر');
    }

    $description = $data['description'] ?? '';
    if(empty($description)){
        return myResponse(false, 'الرجاء ادخال الوصف بشكل صحيح');
    }

    $content = $data['content'] ?? '';
    if(empty($content)){
        return myResponse(false, 'الرجاء ادخال الخبر بشكل صحيح');
    }
    
    if(isset($data['image']) && $data['image']['name'] && !isset($data['deleteImage'])){

        $uploaddir = getcwd().'/../front/uploads/';
        $ext = pathinfo($data['image']['name'], PATHINFO_EXTENSION);
        $image = md5(uniqid().rand(1000,9999)) . '.'.$ext;
        $isUploaded = move_uploaded_file($data['image']['tmp_name'], $uploaddir.$image);
        if(!$isUploaded){
            return myResponse(false, 'فشل عملية رفع الصورة');
        }
    }

    $myData = [
        'category_id'=>$category_id,
        'title'=>sql_scan($title),
        'description'=>sql_scan($description),
        'content'=>sql_scan($content),
    ];

    if(isset($image)){
        $myData['image'] = $image;
    }

    if(isset($data['deleteImage'])){
        $myData['image'] = null;
    }

    $re = sql_update('news', $myData, sprintf('WHERE `id`=%d', $id)); 
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    $user = news_show_by_id($id);

    return myResponse(true, 'تم تعديل البيانات بنجاح', $user);
}

##############################################################################################
// remove
function news_remove($id){
    $news = news_show_by_id($id); 
    if(!$news){
        return myResponse(false, 'هذا الخبر غير موجود');
    }

    comment_remove_by_news_id($news['id']);

    $re = sql_delete('news', sprintf('WHERE `id`=%d', $id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف الخبر بنجاح');
}

function news_remove_by_category_id($category_id){

    $re = sql_delete('news', sprintf('WHERE `category_id`=%d', $category_id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف الاخبار بنجاح');
}