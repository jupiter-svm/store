<?php
//Подключаю класс отладчика
include_once 'debug.php';

class Config extends Debug {  
    //TODO
    //Переделать под private методы с функциями-геттерами
    
    public $dblocation='127.0.0.1';
    public $dbname='shop';
    public $dbuser='root';
    public $dbpasswd='';
   
    public $PathPrefix= '../controllers/';
    public $PathPostfix='Controller.php';   
    
    //Пути к файлам шаблонов {*.tpl}
    public $TemplatePrefix;
    public $TemplateAdminPrefix;
    public $TemplatePostfix='.tpl';
    
    //Пути к файлам шаблонов в вебпространстве
    public $TemplateWebPath;
    public $TemplateAdminWebPath;       
    //>
    
    
    function __construct($template, $templateAdmin) {  
        parent::__construct();
        
        $this->TemplatePrefix="../views/{$template}";
        $this->TemplateAdminPrefix="../views/{$templateAdmin}/";
        
        $this->TemplateWebPath="/templates/{$template}/";
        $this->TemplateAdminWebPath="/templates/{$templateAdmin}/";     
        
        //Здесь конфигурирую Smarty, чей класс наследует класс Debug
        $this->setTemplateDir($this->TemplatePrefix);
        $this->setCompileDir('../tmp/smarty/templates_c');
        $this->setCacheDir('../tmp/smarty/cache');
        $this->setConfigDir('../library/Smarty/libs');

        $this->assign('templateWebPath', $this->TemplateWebPath);        
    }    
}

// Экземпляр класса конфигурации. Указываем папки для шаблонов и
// и пути к файлам шаблонов в вебпространстве
$config=new Config('default', 'admin');