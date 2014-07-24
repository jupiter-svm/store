<?php

/**
 * ProductController.php
 * 
 * Контроллен страницы товара (/product/1)
 * 
 */

//Подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * 
 * @param type $smarty - шаблонизатор
 */
function indexAction($smarty) {
    $itemId=isset($_GET['id']) ? $_GET['id'] : null;
        
        if($itemId==null) exit();
        
        $rsProduct=getProductById($itemId);        
        
        $rsCategories=getAllMainCatsWithChildren();
        
        $smarty->assign('itemInCart', 0);
        
        if(in_array($itemId, $_SESSION['cart'])) {
            $smarty->assign('itemInCart', 1);
        }
        
        $smarty->assign('pageTitle', '');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProduct', $rsProduct);
        
        loadTemplate($smarty, 'header');
        loadTemplate($smarty, 'product');
        loadTemplate($smarty, 'footer');
}