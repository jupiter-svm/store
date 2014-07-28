<?php
/**
 * Модель для таблицы заказов (orders)
 */

include_once 'MPurchaseModel.php';

 class MOrdersModel extends Db { 
     
     //Здесь использую модели продуктов и покупок
     private $MProductsModel;
     private $MPurchaseModel;
     
     function __construct($MProductsModel, $MPurchaseModel) {
         parent::__construct();
         
         $this->MProductsModel=$MProductsModel;
         $this->MPurchaseModel=$MPurchaseModel;
     }
     
    /**
    * @param type $name - имя пользователя
    * @param type $phone - телефон пользователя
    * @param type $address - адрес пользователя
    */
   function makeNewOrder($name, $phone, $address) {

       //>Инициализация переменных
       $userId=$_SESSION['user']['id'];
       $comment="ID пользователя: {$userId}<br />
               Имя: {$name}<br />
               Тел: {$phone}<br />
               Адрес: {$address}";

       $dateCreated=date('Y.m.d H:i:s');
       $userIp=$_SERVER['REMOTE_ADDR'];
       //<

       //Формирование запроса к БД
       $sql="INSERT INTO orders "
               . "(`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)"
               . " VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";    

       $rs=$this->sql($sql);    

       //Получить id созданного заказа
       if($rs) {
           $sql="SELECT id FROM orders ORDER BY id DESC LIMIT 1";          

           $rs=$this->sql($sql);
           $rs=MFunctions::createSmartyRsArray($rs);

           //Возвращаем id созданного запроса
           if(isset($rs[0])) {
               return $rs[0]['id'];
           }
       }    
   }

   /**
    * Получить список продуктов из заказов пользователя
    * 
    * @param type $userId - ID пользователя
    */

   function getOrdersWithProductsByUser($userId) {

       $userId=intval($userId);
       $sql="SELECT * FROM orders WHERE `user_id`='{$userId}' ORDER BY id DESC";

       $rs=$this->sql($sql);

       $smartyRs=array();

       while($row=mysqli_fetch_assoc($rs)) { 
           $rsChildren=$this->MPurchaseModel->getPurchaseForOrder($row['id']);

           if($rsChildren) {
               $row['children']=$rsChildren;
               $smartyRs[]=$row;
           }
       }

       return $smartyRs;
   }

   /**
    * Функция получения заказов
    */
   function getOrders() { 
       $sql="SELECT o.*, u.name, u.email, u.phone, u.address "
            . "FROM orders AS `o` "
            . "LEFT JOIN users AS `u` ON o.user_id=u.id "
            . "ORDER BY id DESC";

       $rs=$this->sql($sql);

       $smartyRs=array();

       while($row=mysqli_fetch_assoc($rs)) {
           $rsChildren=$this->MProductsModel->getProductsForOrder($row['id']);

           if($rsChildren) {
               $row['children']=$rsChildren;
               $smartyRs[]=$row;
           }
       }

       return $smartyRs;
   }

   /**
    * Функция обновления статуса заказа
    * 
    * @global type $db - подключение к БД
    * @param type $itemId - идентификатор заказа
    * @param type $status - статус заказа
    * @return type
    */
   function updateOrderStatus($itemId, $status) {
       $status=intval($status);
       $sql="UPDATE orders SET `status`='{$status}' 
             WHERE id='{$itemId}'";

       $rs=$this->sql($sql);

       return $rs;
   }

   /**
    * 
    * @global type $db - подключение к БД
    * @param type $itemId - идентификатор заявки
    * @param type $datePayment - дата платежа
    * @return type
    */
   function updateOrderDatePayment($itemId, $datePayment) {
       $sql="UPDATE orders SET `date_payment`='{$datePayment}' WHERE id='{$itemId}'";

       $rs=$this->sql($sql);

       return $rs;
    }
}

//Здесь использую модели продуктов и покупок
$MOrdersModel=new MOrdersModel($MProductsModel, $MPurchaseModel);