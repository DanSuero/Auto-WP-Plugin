<?php

function loadThem ($name){
    $file = dirname( __FILE__ )."/core/".$name.'.class.php';
    
    if(file_exists($file)){
        include_once $file;
    }
}

spl_autoload_register("loadThem");