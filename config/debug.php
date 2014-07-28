<?php

//< Инициализация шаблонизатора Smarty
require('../library/Smarty/libs/Smarty.class.php'); 

/**
 * Класс для отладки
 */
class Debug extends Smarty {
    function __construct() {
        parent::__construct();
    }
    
    public function debug($value=null, $die=1) {
        echo 'Debug: <br /><pre />';
        print_r($value);
        echo '</pre>';

        if($die) die;
    }
}
