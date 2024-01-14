<?php 

function myResponse($status, $message='', $data=[]){
    return ['status'=>$status, 'message'=>$message, 'data'=>$data];
}

// scan
function sql_scan($str){
    global $Mysqli;
    $str = trim($str);
    return mysqli_real_escape_string($Mysqli, $str);
}

function sql_select($query){
    global $Mysqli;

    $qreuslt = mysqli_query($Mysqli, $query);

    $count = mysqli_num_rows($qreuslt);
    
    // echo $count ;
    $data = [];
    if($count > 0){
        for($i = 0; $i < $count; $i++){
            $data[] = (array)mysqli_fetch_object($qreuslt);
        }
    }

    return $data;
}

 // select one
function sql_select_one($query){
    $data = sql_select($query);
    return $data[0] ?? null;
}

// insert data
function sql_insert($table, $values){
    global $Mysqli;
    
    $vals = '';
    $cols = '';

    foreach ($values as $key => $value) {
        $cols .= ($cols == '' ? '':', ') . '`'.$key.'`';
        $vals .= ($vals == '' ? '':', ') . ($value === null ? 'NULL':'"'.$value.'"');
    } 

    $query = 'INSERT INTO `'.$table.'` ('.$cols.') VALUES ('.$vals.')';

    $qreuslt = mysqli_query($Mysqli, $query);

    return $qreuslt;
}

// update data
function sql_update($table, $values, $where=''){
    global $Mysqli;

    $data = '';
    foreach ($values as $key => $value) {
        $data .= ($data == '' ? '':', ') . ($value === null ? sprintf('`%s`=NULL', $key) : sprintf('`%s`="%s"', $key, $value));
    }

    $query = 'UPDATE `'.$table.'` SET '.$data.' '.$where;

    $qreuslt = mysqli_query($Mysqli, $query);

    return $qreuslt;
}


// delete data
function sql_delete($table, $where=''){
    global $Mysqli;

    $query = 'DELETE FROM `'.$table.'` '.$where;

    return mysqli_query($Mysqli, $query);
}