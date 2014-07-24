<?php

    $dblocation='127.0.0.1';
    $dbname='shop';
    $dbuser='root';
    $dbpasswd='';
    
    $db=  mysqli_connect($dblocation, $dbuser, $dbpasswd);
    
    if(!$db) {
        echo 'Ошибка доступа к MySQL';
        exit();
    }
    
    mysqli_set_charset($db, 'utf8');
    
    if(!mysqli_select_db($db, $dbname)) {
        echo 'Ошибка доступа к БД '.$dbname;
        exit();
    }  
    