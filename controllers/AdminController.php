<?php

/**
 * AdminController.php
 * 
 * Контроллер бэкэнда сайта (/admin/)
 * 
 */

//Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty) {
    $rsCategories=getAllMainCategories();    
    
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');
    
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}


/**
 * Функция обновления категорий
 * 
 * @param type $smarty - передаётся Smarty
 */
function categoryAction($smarty) {
    $rsCategories=getAllCategories();
    $rsMainCategories=getAllMainCategories();
    
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');
    
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Функция обновления данных категории
 */
function updatecategoryAction() {
    $itemId=$_POST['itemId'];
    $parentId=$_POST['parentId'];
    $newName=$_POST['newName'];
    
    $res=updateCategoryData($itemId, $parentId, $newName);
    
    if($res) {
        $resData['success']=1;
        $resData['message']='Категория обновлена';
    } else {
        $resData['success']=0;
        $resData['message']='Ошибка изменения данных категории';
    }
    
    echo json_encode($resData);    
}

/**
 * Страница управления товарами
 * 
 * @param type $smarty - передаём Smarty
 */
function productsAction($smarty) {
    $rsCategories=getAllCategories();
    $rsProducts=getProducts();    
    
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    $smarty->assign('pageTitle', 'Управление сайтом');
    
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Функция добавления товара
 */
function addproductAction() {
    $itemName=$_POST['itemName'];
    $itemPrice=$_POST['itemPrice'];
    $itemDesc=$_POST['itemDesc'];
    $itemCat=$_POST['itemCatId'];
    
    $res=insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);
    
    if($res) {
        $resData['success']=1;
        $resData['message']='Изменения успешно внесены';
    } else {
        $resData['success']=0;
        $resData['message']='Ошибка изменения данных';
    }
    
    echo json_encode($resData);
}