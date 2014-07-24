<?php

/**
 * Модель для таблицы заказов (orders)
 * 
 * @param type $name - имя пользователя
 * @param type $phone - телефон пользователя
 * @param type $address - адрес пользователя
 */
function makeNewOrder($name, $phone, $address) {
    global $db;
    
    //>Инициализация переменных
    $userId=$_SESSION['user']['id'];
    $comment="ID пользователя: {$userId}<br />
            Имя: {$name}<br />
            Тел: {$phone}<br />
            Адрес: {$address}";
            
    $dateCreated=date('Y.m.d H:i:s');
    $userIp=$_SERVER['REMOTE_ADDR'];
    //<
    
    //Формирование запроса к БД
    $sql="INSERT INTO orders "
            . "(`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)"
            . " VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";    
    
    $rs=mysqli_query($db, $sql);    
    
    //Получить id созданного заказа
    if($rs) {
        $sql="SELECT id FROM orders ORDER BY id DESC LIMIT 1";          
        
        $rs=mysqli_query($db, $sql);
        $rs=createSmartyRsArray($rs);
        
        //Возвращаем id созданного запроса
        if(isset($rs[0])) {
            return $rs[0]['id'];
        }
    }    
}

/**
 * Получить список продуктов из заказов пользователя
 * 
 * @param type $userId - ID пользователя
 */

function getOrdersWithProductsByUser($userId) {
    global $db;
    
    $userId=intval($userId);
    $sql="SELECT * FROM orders WHERE `user_id`='{$userId}' ORDER BY id DESC";
    
    $rs=mysqli_query($db, $sql);
    
    $smartyRs=array();
    
    while($row=mysqli_fetch_assoc($rs)) {
        $rsChildren=getPurchaseForOrder($row['id']);
        
        if($rsChildren) {
            $row['children']=$rsChildren;
            $smartyRs[]=$row;
        }
    }
    
    return $smartyRs;
}