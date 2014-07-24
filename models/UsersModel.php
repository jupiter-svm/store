<?php

/* 
 * Модель пользователей (users)
 * 
 */

/**
 * Функция регистрации пользователя
 * 
 * @param type $email - почта
 * @param type $pwdMD5 - пароль зашифрованный в MD5
 * @param type $name - имя пользователя
 * @param type $phone - телефон
 * @param type $address - адрес пользователя
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $address) {
    global $db;
    
    $email=htmlspecialchars(mysqli_real_escape_string($db, $email));
    $name=htmlspecialchars(mysqli_real_escape_string($db, $name));
    $phone=htmlspecialchars(mysqli_real_escape_string($db, $phone));
    $address=htmlspecialchars(mysqli_real_escape_string($db, $address));
    
    $sql="INSERT INTO users (`email`, `pwd`, `name`, `phone`, `address`) "
            . "VALUES('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$address}')";

    $rs=mysqli_query($db, $sql);
    
    if($rs) {
        $sql="SELECT * FROM users WHERE (`email`='{$email}' and `pwd`='{$pwdMD5}') LIMIT 1";
        
        $rs=mysqli_query($db, $sql);
        $rs=createSmartyRsArray($rs);
        
        if(isset($rs[0])) {
            $rs['success']=1;
        } else {
            $rs['success']=0;
        }
    } else {
        $rs['success']=0;
    }
    
    return $rs;
}

/**
 * Проверка параметров для регистрации пользователя 
 * 
 * @param type $email - e-mail
 * @param type $pwd1 - пароль
 * @param type $pwd2 - повтор пароля
 */
function checkRegisterParams($email, $pwd1, $pwd2) {
    $res=null;
    
    if(!$email) {
        $res['success']=false;
        $res['message']='Введите e-mail';
    }
    
    if(!$pwd1) {
        $res['success']=false;
        $res['message']='Введите пароль';
    }
    
    if($pwd1!=$pwd2) {
        $res['success']=false;
        $res['message']='Пароли не совпадают';
    }
    
    return $res;
}

/**
 * Проверка почты (есть ли такой e-mail в БД)
 * 
 * @param type $email
 */
function checkUserEmail($email) {
    global $db;
    
    $email=  mysql_real_escape_string($email);
    $sql="SELECT id FROM users WHERE email='{$email}'";
    
    $rs=mysqli_query($db, $sql);
    $rs=createSmartyRsArray($rs);
    
    return $rs;
}

/**
 * Авторизация пользователя
 * 
 * @param type $email - почта(логин)
 * @param type $pwd - пароль
 * @return array массив данных пользователя
 */
function loginUser($email, $pwd) {
    global $db;
    
    $email=htmlspecialchars(mysqli_real_escape_string($db, $email));
    $pwd=md5($pwd);
    
    $sql="SELECT * FROM users WHERE (`email`='{$email}' and `pwd`='{$pwd}') LIMIT 1";
    
    $rs=mysqli_query($db, $sql);    
    $rs=createSmartyRsArray($rs);    
    
    if(isset($rs[0])) {
        $rs['success']=1;
    } else {
        $rs['success']=0;
    }
    
    return $rs;
}

/**
 * Изменение данных пользователя
 * 
 * @param type $name - имя пользователя
 * @param type $phone - телефон
 * @param type $address - адрес
 * @param type $pwd1 - пароль
 * @param type $pwd2 - повтор пароля
 * @param type $curPwd - текущий пароль
 */
function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd) {
    global $db;
    
    $email=htmlspecialchars(mysqli_real_escape_string($db, $_SESSION['user']['email']));
    $name=htmlspecialchars(mysqli_real_escape_string($db, $name));
    $phone=htmlspecialchars(mysqli_real_escape_string($db, $phone));
    $address=htmlspecialchars(mysqli_real_escape_string($db, $address));
    $curPwd=htmlspecialchars(mysqli_real_escape_string($db, $curPwd));
    $pwd1=trim($pwd1);
    $pwd2=trim($pwd2);
    
    $newPwd=null;
    
    if($pwd1 && ($pwd1==$pwd2)) {
        $newPwd=md5($pwd1);
    }
    
    $sql="UPDATE users SET ";
    
    if($newPwd) {
        $sql.="`pwd`='{$newPwd}', ";
    }
    
    $sql.=" `name`='{$name}',
            `phone`='{$phone}',
            `address`='{$address}'
             WHERE `email`='{$email}' AND `pwd`='{$curPwd}' LIMIT 1";             
             
    $rs=  mysqli_query($db, $sql);
    
    return $rs;
}


/**
 * Функция получения данных о заказах пользователя
 * 
 */
function getCurUserOrders() {
    $userId=isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $rs=getOrdersWithProductsByUser($userId);
    
    return $rs;
}