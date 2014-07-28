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

        $rsCategory=$this->MCategoriesModel->getCatById($catId);    

        //Если главная категория, то показываем дочерние категории,
        //иначе показываем товар    
        if($rsCategory['parent_id']==0) {       
            $rsChildCats=$this->MCategoriesModel->getChildrenForCat($catId);        
        } else {
            $rsProducts=$this->MProductsModel->getProductsByCat($catId);
        }

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