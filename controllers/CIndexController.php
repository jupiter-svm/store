<?php
    include_once '../models/MCategoriesModel.php';
    include_once '../models/MProductsModel.php';

class CIndexController {    
    private $MCategoriesModel;
    private $MProductsModel;
    
    function __construct($MCategoriesModel, $MProductsModel) {
        $this->MCategoriesModel=$MCategoriesModel;
        $this->MProductsModel=$MProductsModel;
    }
    
    function indexAction($config) {        
        $rsCategories=$this->MCategoriesModel->getAllMainCatsWithChildren();          
        
        $rsProducts=$this->MProductsModel->getLastProducts(16);
        
        $config->assign('pageTitle', 'Главная страница сайта');
        $config->assign('rsCategories', $rsCategories);
        $config->assign('rsProducts', $rsProducts);        
        
        MFunctions::loadTemplate($config, 'header');
        MFunctions::loadTemplate($config, 'index');
        MFunctions::loadTemplate($config, 'footer');        
    }
}

$CPageController=new CIndexController($MCategoriesModel, $MProductsModel);
