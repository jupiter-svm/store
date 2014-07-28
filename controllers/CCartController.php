<?php

/**
 * Контроллер работы с корзиной (/cart/)
 */

//Подключаем модели
include_once '../models/MCategoriesModel.php';
include_once '../models/MProductsModel.php';
include_once '../models/MPurchaseModel.php';
include_once '../models/MOrdersModel.php';

class CCartController {
    private $MCategoriesModel;
    private $MProductsModel;
    private $MOrdersModel;
    private $MPurchaseModel;
    
    function __construct($MCategoriesModel, $MProductsModel, $MOrdersModel, $MPurchaseModel) {
        $this->MCategoriesModel=$MCategoriesModel;
        $this->MProductsModel=$MProductsModel;
        $this->MOrdersModel=$MOrdersModel;
        $this->MPurchaseModel=$MPurchaseModel;
    }
    
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
    function indexAction($config) {
        $itemIds=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        $rsCategories=$this->MCategoriesModel->getAllMainCatsWithChildren();
        $rsProducts=$this->MProductsModel->getProductsFromArray($itemIds);

        $config->assign('pageTitle', 'Корзина');
        $config->assign('rsCategories', $rsCategories);
        $config->assign('rsProducts', $rsProducts);

        MFunctions::loadTemplate($config, 'header');
        MFunctions::loadTemplate($config, 'cart');
        MFunctions::loadTemplate($config, 'footer');
    }

    /**
     * Формирование страницы заказа
     * 
     * @param type $smarty
     */
    function orderAction($config) {
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

        $rsProducts=$this->MProductsModel->getProductsFromArray($itemsIds);    

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

        $rsCategories=$this->MCategoriesModel->getAllMainCatsWithChildren();

        //Прячем элементы блога логина и регистрации в боковой панели
        if(!isset($_SESSION['user'])) {
            $smarty->assign('hideLoginBox', 1);
        }

        $config->assign('pageTitle', 'Заказ');
        $config->assign('rsCategories', $rsCategories);
        $config->assign('rsProducts', $rsProducts);

        MFunctions::loadTemplate($config, 'header');
        MFunctions::loadTemplate($config, 'order');
        MFunctions::loadTemplate($config, 'footer');
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

        $orderId=$this->MOrdersModel->makeNewOrder($name, $phone, $address);

        //Если заказ не создан, то выдаём ошибку и завершаем функцию
        if(!$orderId) {
            $resData['success']=0;
            $resData['message']='Ошибка создания заказа';

            echo json_encode($resData);

            return;
        }

        //Сохраняем товары для созданного заказа
        $res=$this->MPurchaseModel->setPurchaseForOrder($orderId, $cart);

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
}

$CPageController=new CCartController($MCategoriesModel, $MProductsModel, $MOrdersModel, $MPurchaseModel);