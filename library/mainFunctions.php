<?php      
/**
 * Класс вспомогательных функций
 */
class MFunctions {    
    
   //Функция загрузки страниц сайта 
   public function loadPage($config, $controllerName, $actionName='index') {  
        $controllerName='C'.$controllerName;
       
        include_once $config->PathPrefix.$controllerName.$config->PathPostfix;

        $function=$actionName.'Action';
        
        //Контроллер каждой страницы будет возвзащать свой экземпляр с таким именем
        $CPageController->$function($config);
    }

    //функция загрузки шаблона сайта
    public function loadTemplate($config, $templateName) { 
        $config->display($templateName. $config->TemplatePostfix);
    }

    //Функция создания массива данных из результатов запроса к БД
    public static function createSmartyRsArray($rs) {
        if(!$rs) { return false; }

        $smartyRs=array();

        while($row=mysqli_fetch_assoc($rs)) {
            $smartyRs[]=$row;
        }        

        return $smartyRs;
    }

    //Функция редиректа пользователя
    public static function redirect($url) {
        if(!$url) { $url='/'; }

        header("Location: {$url}");    
    }
}

$MFunctions=new MFunctions();