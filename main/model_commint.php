<?php

##############################################################################################
// show all
function comment_show_all_by_news_id($news_id){
    
    $query = sprintf('SELECT * FROM `comments` WHERE `news_id`=%d', $news_id);

    return sql_select($query);
}

##############################################################################################
// show by id
function comment_show_by_id($id){

    $query = sprintf('SELECT * FROM `comments` WHERE `id`=%d', $id);

    return sql_select_one($query);
}

##############################################################################################
// get count by news id
function comment_get_count_by_news_id($news_id){
    
    $query = sprintf('SELECT COUNT(*) AS `count` FROM `comments` WHERE `news_id`=%d', $news_id);

    $data = sql_select_one($query);

    return $data['count'] ?? 0;
}
##############################################################################################
// add
function comment_add($data){

    $news_id = $data['news_id'] ?? '';
    if(empty($news_id)){
        return myResponse(false, 'الرجاء اختيار الخبر');
    }

    $news = news_show_by_id($news_id);
    if(!$news){
        return myResponse(false, 'هذا الخبر غير موجود');
    }

    $comment = $data['comment'] ?? '';
    if(empty($comment)){
        return myResponse(false, 'الرجاء كتابة التعليق');
    }

    $user = user_session();
    $user_id = $user['id'];

    $myData = [
        'user_id'=>$user_id,
        'news_id'=>$news_id,
        'comment'=>sql_scan($comment),
        'datetime'=>date('Y-m-d H:i:s'),
    ];

    $re = sql_insert('comments', $myData);
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم ادخال التعليق بنجاح');
}

##############################################################################################
// remove
function comment_remove($id){

    $comment = comment_show_by_id($id); 

    if(!$comment){
        return myResponse(false, 'هذا التعليق غير موجود');
    }

    $re = sql_delete('comments', sprintf('WHERE `id`=%d', $id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف التعليق بنجاح');
}

function comment_remove_by_user_id($user_id){

    $re = sql_delete('comments', sprintf('WHERE `user_id`=%d', $user_id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف التعليقات بنجاح');
}

function comment_remove_by_news_id($news_id){
    $re = sql_delete('comments', sprintf('WHERE `news_id`=%d', $news_id));
    if(!$re){
        return myResponse(false, 'حدث خطأ غير معروف، الرجاء المحاولة مرة اخرى');
    }

    return myResponse(true, 'تم حذف التعليقات بنجاح');
}