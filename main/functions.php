<?php 

function getOldData($name){
    $val =  null;
    if(isset($_SESSION['oldData'][$name])){
        $val = $_SESSION['oldData'][$name];
        unset($_SESSION['oldData'][$name]);
    }
    
    return $val;
}

function setOldData($data){
    $_SESSION['oldData']  = $data;
}