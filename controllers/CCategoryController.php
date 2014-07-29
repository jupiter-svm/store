<?php

/**
 * Контроллер страницы категории (/category/1)
 */

include_once '../models/MCategoriesModel.php';
include_once '../models/MProductsModel.php';

class CCategoryController {
    private $MCategoriesModel;
    private $MProductsModel;
    
    function __construct($MCategoriesModel, $MProductsModel) {
        $this->MCategoriesModel=$MCategoriesModel;
        $this->MProductsModel=$MProductsModel;
    }
    
    function indexAction($config) {
        $catId=isset($_GET['id']) ? $_GET['id'] : null;

        if(!$catId) exit();    

        $rsChildCats=null;

        //Получаем название категории
        $rsCategory=$this->MCategoriesModel->getCatById($catId);    

        //Получаем дочерние категории      
        $rsChildCats=$this->MCategoriesModel->getChildrenForCat($catId);        
        
        //Получаем товар из категории
        $rsProducts=$this->MProductsModel->getProductsByCat($catId);
       
        //Получить главные категории с привязками дочерних 
        $rsCategories=$this->MCategoriesModel->getAllMainCatsWithChildren();

        $config->assign('pageTitle', 'Товары категории '.$rsCategory['name']);

        $config->assign('rsCategory', $rsCategory);
        $config->assign('rsProducts', $rsProducts);
        $config->assign('rsChildCats', $rsChildCats);

        $config->assign('rsCategories', $rsCategories);

        MFunctions::loadTemplate($config, 'header');
        MFunctions::loadTemplate($config, 'category');
        MFunctions::loadTemplate($config, 'footer');
    }
}

$CPageController=new CCategoryController($MCategoriesModel, $MProductsModel);