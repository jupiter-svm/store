<?php

/**
 * ProductController.php
 * 
 * Контроллен страницы товара (/product/1)
 * 
 */

//Подключаем модели
include_once '../models/MProductsModel.php';
include_once '../models/MCategoriesModel.php';

class CProductController {
    private $MCategoriesModel;
    private $MProductsModel;
    
    function __construct($MCategoriesModel, $MProductsModel) {
        $this->MCategoriesModel=$MCategoriesModel;
        $this->MProductsModel=$MProductsModel;
    }
    
    /**
     * 
     * @param type $smarty - шаблонизатор
     */
    function indexAction($config) {
        $itemId=isset($_GET['id']) ? $_GET['id'] : null;

            if($itemId==null) exit();

            $rsProduct=$this->MProductsModel->getProductById($itemId);        

            $rsCategories=$this->MCategoriesModel->getAllMainCatsWithChildren();

            $config->assign('itemInCart', 0);

            if(in_array($itemId, $_SESSION['cart'])) {
                $config->assign('itemInCart', 1);
            }

            $config->assign('pageTitle', '');
            $config->assign('rsCategories', $rsCategories);
            $config->assign('rsProduct', $rsProduct);

            MFunctions::loadTemplate($config, 'header');
            MFunctions::loadTemplate($config, 'product');
            MFunctions::loadTemplate($config, 'footer');
    }
}

$CPageController=new CProductController($MCategoriesModel, $MProductsModel);