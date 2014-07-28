<?php

/**
 * AdminController.php
 * 
 * Контроллер бэкэнда сайта (/admin/)
 * 
 */


if($_SESSION['user']['role']!=1) {
    MFunctions::redirect('/');
}

//Подключаем модели
include_once '../models/MCategoriesModel.php';
include_once '../models/MProductsModel.php';
include_once '../models/MOrdersModel.php';
include_once '../models/MPurchaseModel.php';

$config->setTemplateDir($config->TemplateAdminPrefix);
$config->assign('templateWebPath', $config->TemplateAdminWebPath);

class CAdminController {
    private $MCategoriesModel;
    private $MProductsModel;
    private $MOrdersModel;
    private $MPurchaseModel;
    
    function __construct($MCategoriesModel,$MProductsModel, $MOrdersModel, $MPurchaseModel) {
        $this->MCategoriesModel=$MCategoriesModel;
        $this->MProductsModel=$MProductsModel;
        $this->MOrdersModel=$MOrdersModel;
        $this->MPurchaseModel=$MPurchaseModel;
    }
    
    /**
     * Отображение главной страницы
     */
    function indexAction($config) {
        $rsCategories=$this->MCategoriesModel->getAllMainCategories();    

        $config->assign('rsCategories', $rsCategories);
        $config->assign('pageTitle', 'Управление сайтом');

        MFunctions::loadTemplate($config, 'adminHeader');
        MFunctions::loadTemplate($config, 'admin');
        MFunctions::loadTemplate($config, 'adminFooter');
    }
    
    /**
     * Функция добавления новой категории
     */
    function addnewcatAction() {
        $catName=$_POST['newCategoryName'];
        $catParentId=$_POST['generalCatId'];
        
        $res=$this->MCategoriesModel->insertCat($catName, $catParentId);
        
        if($res) {
            $resData['success']=1;
            $resData['message']='Категория добавлена';
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка добавления категории';
        }
        
        echo json_encode($resData);
    }

    /**
     * Функция обновления категорий
     * 
     * @param type $config - передаётся Smarty
     */
    function categoryAction($config) {
        $rsCategories=$this->MCategoriesModel->getAllCategories();
        $rsMainCategories=$this->MCategoriesModel->getAllMainCategories();

        $config->assign('rsCategories', $rsCategories);
        $config->assign('rsMainCategories', $rsMainCategories);
        $config->assign('pageTitle', 'Управление сайтом');

        MFunctions::loadTemplate($config, 'adminHeader');
        MFunctions::loadTemplate($config, 'adminCategory');
        MFunctions::loadTemplate($config, 'adminFooter');
    }

    /**
     * Функция обновления данных категории
     */
    function updatecategoryAction() {
        $itemId=$_POST['itemId'];
        $parentId=$_POST['parentId'];
        $newName=$_POST['newName'];

        $res=$this->MCategoriesModel->updateCategoryData($itemId, $parentId, $newName);

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
     * @param type $config - передаём Smarty
     */
    function productsAction($config) {
        $rsCategories=$this->MCategoriesModel->getAllCategories();
        $rsProducts=$this->MProductsModel->getProducts();    

        $config->assign('rsCategories', $rsCategories);
        $config->assign('rsProducts', $rsProducts);

        $config->assign('pageTitle', 'Управление сайтом');

        MFunctions::loadTemplate($config, 'adminHeader');
        MFunctions::loadTemplate($config, 'adminProducts');
        MFunctions::loadTemplate($config, 'adminFooter');
    }

    /**
     * Функция добавления товара
     */
    function addproductAction() {
        $itemName=$_POST['itemName'];
        $itemPrice=$_POST['itemPrice'];
        $itemDesc=$_POST['itemDesc'];
        $itemCat=$_POST['itemCatId'];

        $res=$this->MProductsModel->insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

        if($res) {
            $resData['success']=1;
            $resData['message']='Изменения успешно внесены';
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка изменения данных';
        }

        echo json_encode($resData);
    }

    /**
     *  Функция обновления данных о продукте
     */
    function updateproductAction() {
        $itemId=$_POST['itemId'];
        $itemName=$_POST['itemName'];
        $itemPrice=$_POST['itemPrice'];
        $itemStatus=$_POST['itemStatus'];
        $itemDesc=$_POST['itemDesc'];
        $itemCat=$_POST['itemCatId'];

        $res=$this->MProductsModel->updateProduct($itemId, $itemName, $itemPrice, 
                            $itemStatus, $itemDesc, $itemCat);   

        if($res) {
            $resData['success']=1;
            $resData['message']='Изменения успешно внесены';
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка изменения данных';
        }

        echo json_encode($resData);

    }

    /**
     * Функция загрузки файла
     */
    function uploadAction() {
        $maxSize=2*1024*1024;

        $itemId=$_POST['itemId'];
        //Получаем расширение загружаемого файла
        $ext=pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
        //Создаём имя файла
        $newFileName=$itemId.'.'.$ext;

        if($_FILES['filename']['size']>$maxSize) {
            echo 'Размер файла превышает два мегабайта';
            return;
        }

        if(is_uploaded_file($_FILES['filename']['tmp_name'])) { 
            //Если файл загружен, то перемещаем его из временной директории в конечную
            $res=move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/products/'.$newFileName);

            if($res) { 
                $res=$this->MProductsModel->updateProductImage($itemId, $newFileName);

                if($res) {
                    MFunctions::redirect('/admin/products/');
                } else {
                    echo 'Ошибка обновления информации о товаре';
                }
            }
        } else {
            echo 'Ошибка загрузки файла';
        }

    }

    /**
     * Функция работы с заказами
     * 
     * @param type $config - передаём Smarty
     */
    function ordersAction($config) {
        $rsOrders=$this->MOrdersModel->getOrders();

        $config->assign('rsOrders', $rsOrders);
        $config->assign('pageTitle', 'Заказы');

        MFunctions::loadTemplate($config, 'adminHeader');
        MFunctions::loadTemplate($config, 'adminOrders');
        MFunctions::loadTemplate($config, 'adminFooter');
    }

    /**
     * Функция обновления статуса заказа
     */
    function setorderstatusAction() {
        $itemId=$_POST['itemId'];
        $status=$_POST['status'];

        $res=$this->MOrdersModel->updateOrderStatus($itemId, $status);

        if($res) {
            $resData['success']=1;
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка установки статуса';
        }

        echo json_encode($resData);
    }

    function setorderdatepaymentAction() {
        $itemId=$_POST['itemId'];
        $datePayment=$_POST['datePayment'];

        $res=$this->MOrdersModel->updateOrderDatePayment($itemId, $datePayment);

        if($res) {
            $resData['success']=1;
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка установки статуса';
        }

        echo json_encode($resData);
    }
}

$CPageController=new CAdminController($MCategoriesModel, $MProductsModel, $MOrdersModel, $MPurchaseModel);