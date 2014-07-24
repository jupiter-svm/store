<?php

/**
 * Модель для таблицы продукции {products}
 */

function getLastProducts($limit=null) {
    global $db;
    
    $sql="SELECT * FROM products ORDER BY id DESC";
    
    if($limit) {
        $sql.=" LIMIT {$limit}";
    }
    
    $rs=mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Функция вывода товаров из категории
 */

function getProductsByCat($itemId) {
    global $db;
    
    $itemId=intval($itemId);
    
    $sql="SELECT * FROM products WHERE category_id='{$itemId}'";
    
    //debug($sql);
    
    $rs=mysqli_query($db, $sql);   
    
    return createSmartyRsArray($rs);
}

/**
 * 
 * @global type $db - Подключение к БД
 * @param type $itemId - ID товара
 * @return type массив данных продукта
 */
function getProductById($itemId) {
    global $db;
    
    $itemId=intval($itemId);
    
    $sql="SELECT * FROM products WHERE id='{$itemId}'";
    
    $rs=mysqli_query($db, $sql);
    
    return mysqli_fetch_assoc($rs);    
}

/**
 * Получить список продуктов из массива идентификаторов (ID'S)
 * 
 * @param type $itemsIds
 */
function getProductsFromArray($itemsIds) {
    global $db;   
    
    $strIds=implode($itemsIds, ', '); 
    
    $sql="SELECT * FROM products WHERE id IN ({$strIds})";
    
    $rs=mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Функция получения продуктов
 * 
 * @global type $db - идентификатор подключения к БД
 * @return type
 */
function getProducts() {
    global $db;
    
    $sql="SELECT * FROM `products` ORDER BY category_id";
    
    $rs=mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Функция добавления нового товара
 * 
 * @global type $db - глобальный идентификатор подключения
 * @param type $itemName - имя товара
 * @param type $itemPrice - цена товара
 * @param type $itemDesc - описание товара
 * @param type $itemCat - название категории
 * @return type
 */
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat) {
    global $db;
    
    $sql="INSERT INTO products SET 
        `name` = '{$itemName}',
        `price` = '{$itemPrice}',
        `description` = '{$itemDesc}',
        `category_id` = '{$itemCat}'";
        
    $rs=mysqli_query($db, $sql);
    
    return $rs;
}