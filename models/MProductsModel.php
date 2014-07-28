<?php

/**
 * Модель для таблицы продукции {products}
 */

class MProductsModel extends Db {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Функция вывода товаров
     * 
     * @param type $limit - количество выводимых позиций
     * @return type
     */
    function getLastProducts($limit=null) {        

        $sql="SELECT * FROM products WHERE status=1 ORDER BY id DESC";

        if($limit) {
            $sql.=" LIMIT {$limit}";
        }

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * Функция вывода товаров из категории
     */

    function getProductsByCat($itemId) {
        $itemId=intval($itemId);

        $sql="SELECT * FROM products WHERE category_id='{$itemId}'";

        //debug($sql);

        $rs=$this->sql($sql);   

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * 
     * @param type $itemId - ID товара
     * @return type массив данных продукта
     */
    function getProductById($itemId) {
        $itemId=intval($itemId);

        $sql="SELECT * FROM products WHERE id='{$itemId}'";

        $rs=$this->sql($sql);

        return mysqli_fetch_assoc($rs);    
    }

    /**
     * Получить список продуктов из массива идентификаторов (ID'S)
     * 
     * @param type $itemsIds
     */
    function getProductsFromArray($itemsIds) {
        $strIds=implode($itemsIds, ', '); 

        $sql="SELECT * FROM products WHERE id IN ({$strIds})";

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * Функция получения продуктов
     * 
     * @return type
     */
    function getProducts() {
        $sql="SELECT * FROM `products` ORDER BY category_id";

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * Функция добавления нового товара
     * 
     * @param type $itemName - имя товара
     * @param type $itemPrice - цена товара
     * @param type $itemDesc - описание товара
     * @param type $itemCat - название категории
     * @return type
     */
    function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat) {

        $sql="INSERT INTO products SET 
            `name` = '{$itemName}',
            `price` = '{$itemPrice}',
            `description` = '{$itemDesc}',
            `category_id` = '{$itemCat}'";

        $rs=$this->sql($sql);

        return $rs;
    }

    /**
     * Функция обновления данных о продукте
     * 
     * @param type $itemId - идентификатор товара
     * @param type $itemName - название товара
     * @param type $itemPrice - цена товара
     * @param type $itemStatus - статус товара
     * @param type $itemDesc - описание товара
     * @param type $itemCat - категория товара
     * @param type $newFileName - новое имя файла
     * @return type
     */
    function updateProduct($itemId, $itemName, $itemPrice, 
                                $itemStatus, $itemDesc, $itemCat, $newFileName=null) {

        $set=array();

        if($itemName) {
            $set[]="`name`='{$itemName}'";
        }

        if($itemPrice>0) {
            $set[]="`price`='{$itemPrice}'";
        }

        if($itemStatus!==null) {
            $set[]="`status`='{$itemStatus}'";
        }

        if($itemDesc) {
            $set[]="`description`='{$itemDesc}'";
        }

        if($itemCat) {
            $set[]="`category_id`='{$itemCat}'";
        }

        if($newFileName) {
            $set[]="`image`='{$newFileName}'";
        }

        $setStr=implode($set, ", ");

        $sql="UPDATE products SET {$setStr} WHERE id='{$itemId}'";

        $rs=$this->sql($sql);

        return $rs;
    }

    /**
     * Функция обновления данных о картинке
     * 
     * @param type $itemId - идентификатор товара
     * @param type $newFileName - название сохраняемого файла
     */
    function updateProductImage($itemId, $newFileName) {
        $rs=$this->updateProduct($itemId, null, null, null, null, null, $newFileName);

        return $rs;
    }

    /**
     * Получить продукты заказа
     * 
     * @param type $orderId - ID заказа
     */
    function getProductsForOrder($orderId) {

        $sql="SELECT * FROM purchase AS pe "
             ."LEFT JOIN products AS ps "
             ."ON pe.product_id=ps.id "
             ."WHERE (`order_id`='{$orderId}')";

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }
}

$MProductsModel=new MProductsModel();