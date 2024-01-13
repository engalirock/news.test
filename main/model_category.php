<?php

##############################################################################################
// show all
function category_show_all(){
    
    $query = 'SELECT * FROM `categories`';

    return sql_select($query);
}

##############################################################################################
// show by id
function category_show_by_id($id){

    $query = sprintf('SELECT * FROM `categories` WHERE `id`=%d', $id);

    return sql_select_one($query);
}
##############################################################################################
// show by name
function category_show_by_name($name){

    $name = sql_scan($name);
    $query = sprintf('SELECT * FROM `categories` WHERE `name`="%s"', $name);

    return sql_select_one($query);
}


##############################################################################################
// add
function category_add($data){


    $name = $data['name'] ?? '';
    if(empty($name)){
        return myResponse(false, 'الرجاء ادخال الاسم بشكل صحيح');
    }

    if(category_show_by_name($name)){
        return myResponse(false, 'هذا الاسم مستخدم من قبل، الرجاء كتابة اختيار اسم جديد');
    }

    $myData = [
        'name'=>$name,
    ];

    $re = sql_insert('categories', $myData);
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم ادخال القسم بنجاح');
}

##############################################################################################
// edit
function category_edit($id, $data){ 
    $category = category_show_by_id($id); 
    if(!$category){
        return myResponse(false, 'هذا القسم غير موجود');
    }

    $name = $data['name'] ?? '';
    if(empty($name)){
        return myResponse(false, 'الرجاء ادخال الاسم بشكل صحيح');
    }

    $myData = [
        'name'=>$name,
    ];

    $re = sql_update('categories', $myData, sprintf('WHERE `id`=%d', $id)); 
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    $category = category_show_by_id($id);

    return myResponse(true, 'تم تعديل البيانات بنجاح', $category);
}

##############################################################################################
// remove
function category_remove($id){
    $category = category_show_by_id($id); 
    if(!$category){
        return myResponse(false, 'هذا القسم غير موجود');
    }

    // حذف اخبار القسم قبل حذف القسم
    news_remove_by_category_id($category['id']);

    $re = sql_delete('categories', sprintf('WHERE `id`=%d', $id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف القسم بنجاح', $category);
}