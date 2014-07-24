<?php
    define('PathPrefix', '../controllers/');
    define('PathPostfix', 'Controller.php');
    
    //Используемые шаблоны
    $template='default';
    $templateAdmin='admin';
    
    //Пути к файлам шаблонов {*.tpl}
    define('TemplatePrefix', "../views/{$template}/");
    define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
    define('TemplatePostfix', '.tpl');
    
    //Пути к файлам шаблонов в вебпространстве
    define('TemplateWebPath', "/templates/{$template}/");
    define('TemplateAdminWebPath', "/templates/{$templateAdmin}/");
    
    //< Инициализация шаблонизатора Smarty
    require('../library/Smarty/libs/Smarty.class.php');   
    
    $smarty=new Smarty();
    
    $smarty->setTemplateDir(TemplatePrefix);
    $smarty->setCompileDir('../tmp/smarty/templates_c');
    $smarty->setCacheDir('../tmp/smarty/cache');
    $smarty->setConfigDir('../library/Smarty/libs');
    
    $smarty->assign('templateWebPath', TemplateWebPath);
    
    //>