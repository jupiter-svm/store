<?php

/**
 * Контроллер работы с корзиной (/cart/)
 */

//Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

/**
 * Добавление продукта в корзину
 * 
 * @param integer id GET параметр - ID добавляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине
 */
function addtocartAction() {
    $itemId=isset($_GET['id']) ? intval($_GET['id']) : null;
    
    if(!$itemId) return false;
    
    $resData=array();
    
    if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart'])===false) {
        $_SESSION['cart'][]=$itemId;
        $resData['cntItems']=count($_SESSION['cart']);
        $resData['success']=1;        

    } else {
        $resData['success']=0;
    }
    
    echo json_encode($resData);
}

/**
 * Удаление продукта из корзины
 */
function removefromcartAction() {
    $itemId=isset($_GET['id']) ? intval($_GET['id']) : null;
    
    if(!$itemId) exit();
    
    $resData=array();
    
    $key=array_search($itemId, $_SESSION['cart']);
    
    if($key!==false) {
        unset($_SESSION['cart'][$key]);
        
        $resData['success']=1;
        $resData['cntItems']=count($_SESSION['cart']);                
    } else {
        $resData['success']=0;
    }
    
    echo json_encode($resData);
}

/**
 * Формирование страницы корзины
 * 
 * @param type $smarty
 */
function indexAction($smarty) {
    $itemIds=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $rsCategories=getAllMainCatsWithChildren();
    $rsProducts=getProductsFromArray($itemIds);
    
    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

/**
 * Формирование страницы заказа
 * 
 * @param type $smarty
 */
function orderAction($smarty) {
    $itemsIds=isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    
    if(!$itemsIds) {
        redirect('/cart/');
        
        return;
    }
    
    //Получаем из массива $_POST количество покупаемых товаров
    $itemsCnt=array();

    foreach($itemsIds as $item) {
        //Формируем ключ для массива POST
        $postVar='itemCnt_'.$item;

        //Создаём элемент массива количества покупаемого товара
        $itemsCnt[$item]=isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
    
    $rsProducts=getProductsFromArray($itemsIds);    
    
    $i=0;

    foreach($rsProducts as &$item) {
        $item['cnt']=isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        
        if($item['cnt']) {
            $item['realPrice']=$item['cnt']*$item['price'];
        } else {
            unset($rsProducts[$i]);
        }
        
        $i++;
    }
    
    if(!$rsProducts) {
        echo "Корзина пуста";
        
        return;
    }
    
    //Полученный массив попупаемых товаров помещаем в сессионную переменную
    $_SESSION['saleCart']=$rsProducts;
    
    $rsCategories=getAllMainCatsWithChildren();
    
    //Прячем элементы блога логина и регистрации в боковой панели
    if(!isset($_SESSION['user'])) {
        $smarty->assign('hideLoginBox', 1);
    }
    
    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

/**
 * Функция сохраниния заказа
 * 
 * @param array $_SESSION['saleCart'] - массив покупок из корзины
 * 
 */
function saveorderAction() {
    $cart=isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
    
    if(!$cart) {
        $resData['success']=0;
        $resData['message']='Нет товаров для заказа';
        
        echo json_encode($resData);
        
        return;
    }
    
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    
    $orderId=makeNewOrder($name, $phone, $address);
    
    //Если заказ не создан, то выдаём ошибку и завершаем функцию
    if(!$orderId) {
        $resData['success']=0;
        $resData['message']='Ошибка создания заказа';
        
        echo json_encode($resData);
        
        return;
    }
    
    //Сохраняем товары для созданного заказа
    $res=setPurchaseForOrder($orderId, $cart);
    
    //Если успешно, то формируем ответ, удаляем переменные корзины
    if($res) {
        $resData['success']=1;
        $resData['message']='Заказ сохранён';
        
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success']=0;
        $resData['message']='Ошибка внесения данных для заказа № '.$orderId;
    }
    
    echo json_encode($resData);
}