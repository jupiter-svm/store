<?php


/**
 * Модель для таблицы продукции (purchase)
 * 
 * 
 */


/**
 * Внесение в БД данных продуктов с привязкой к заказу
 * 
 * @param type $orderId
 * @param type $cart
 */
function setPurchaseForOrder($orderId, $cart) {
    global $db;
    
    $sql="INSERT INTO purchase (order_id, product_id, price, amount) VALUES ";
    
    $values=array();
    
    //Формируем массив строк для запроса для каждого товара
    foreach($cart as $item) {
        $values[]="('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }
    
    //Преобразовываем массив в строку
    $sql.=implode($values, ', ');
    $rs=mysqli_query($db, $sql);
    
    return $rs;
}


/**
 * Функция получения товаров из заказа
 * 
 * @global type $db - переменная подключения к БД
 * @param type $orderId - идентификатор заказа
 * @return type - массив позиций заказа
 */
function getPurchaseForOrder($orderId) {
    global $db;
    
    $sql="SELECT `pe`.*, `ps`.name FROM purchase as `pe`
        JOIN products as `ps` ON `pe`.product_id=`ps`.id
        WHERE `pe`.order_id={$orderId}";        
        
    $rs=mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}