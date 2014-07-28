<?php
session_start(); //Стартуем сессию

//Проверим, есть ли массив корзины
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart']=array();
}
    
include_once '../config/config.php';             //Инициализация настроек
include_once '../config/db.php';                 //Инициализация подключения к БД
include_once '../library/mainFunctions.php';     //Подключение основных функций   

$controllerName=isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';    

$actionName=isset($_GET['action']) ? $_GET['action'] : 'index';  

//Проверка авторизации пользователя
if(isset($_SESSION['user'])) {
    $config->assign('arUser', $_SESSION['user']);
}

//Инициализируем переменную шаблонизатора количества элементов в корзине
$config->assign('cartCntItems', count($_SESSION['cart']));

//Загружаем страницу сайта
$MFunctions->loadPage($config, $controllerName, $actionName);