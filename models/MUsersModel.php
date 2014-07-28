<?php

/* 
 * Модель пользователей (users)
 * 
 */

class MUsersModel extends Db {
    private $MOrdersModel;
    
    function __construct($MOrdersModel) {
        parent::__construct();
        
        $this->MOrdersModel=$MOrdersModel;
    }
    
    /**
     * Функция регистрации пользователя
     * 
     * @param type $email - почта
     * @param type $pwdMD5 - пароль зашифрованный в MD5
     * @param type $name - имя пользователя
     * @param type $phone - телефон
     * @param type $address - адрес пользователя
     */
    function registerNewUser($email, $pwdMD5, $name, $phone, $address) {

        $email=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $email));
        $name=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $name));
        $phone=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $phone));
        $address=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $address));

        $sql="INSERT INTO users (`email`, `pwd`, `name`, `phone`, `address`) "
                . "VALUES('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$address}')";

        $rs=$this->sql($sql);

        if($rs) {
            $sql="SELECT * FROM users WHERE (`email`='{$email}' and `pwd`='{$pwdMD5}') LIMIT 1";

            $rs=$this->sql($sql);
            $rs=  MFunctions::createSmartyRsArray($rs);

            if(isset($rs[0])) {
                $rs['success']=1;
            } else {
                $rs['success']=0;
            }
        } else {
            $rs['success']=0;
        }

        return $rs;
    }

    /**
     * Проверка параметров для регистрации пользователя 
     * 
     * @param type $email - e-mail
     * @param type $pwd1 - пароль
     * @param type $pwd2 - повтор пароля
     */
    function checkRegisterParams($email, $pwd1, $pwd2) {
        $res=null;

        if(!$email) {
            $res['success']=false;
            $res['message']='Введите e-mail';
        }

        if(!$pwd1) {
            $res['success']=false;
            $res['message']='Введите пароль';
        }

        if($pwd1!=$pwd2) {
            $res['success']=false;
            $res['message']='Пароли не совпадают';
        }

        return $res;
    }

    /**
     * Проверка почты (есть ли такой e-mail в БД)
     * 
     * @param type $email
     */
    function checkUserEmail($email) {

        $email= mysqli_real_escape_string($this->getConnection(), $email);
        $sql="SELECT id FROM users WHERE email='{$email}'";

        $rs=$this->sql($sql);
        $rs=MFunctions::createSmartyRsArray($rs);

        return $rs;
    }

    /**
     * Авторизация пользователя
     * 
     * @param type $email - почта(логин)
     * @param type $pwd - пароль
     * @return array массив данных пользователя
     */
    function loginUser($email, $pwd) { 
        $email=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $email));
        $pwd=md5($pwd);

        $sql="SELECT * FROM users WHERE (`email`='{$email}' and `pwd`='{$pwd}') LIMIT 1";

        $rs=$this->sql($sql);    
        $rs=MFunctions::createSmartyRsArray($rs);    

        if(isset($rs[0])) {
            $rs['success']=1;
        } else {
            $rs['success']=0;
        }

        return $rs;
    }

    /**
     * Изменение данных пользователя
     * 
     * @param type $name - имя пользователя
     * @param type $phone - телефон
     * @param type $address - адрес
     * @param type $pwd1 - пароль
     * @param type $pwd2 - повтор пароля
     * @param type $curPwd - текущий пароль
     */
    function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd) {

        $email=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $_SESSION['user']['email']));
        $name=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $name));
        $phone=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $phone));
        $address=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $address));
        $curPwd=htmlspecialchars(mysqli_real_escape_string($this->getConnection(), $curPwd));
        $pwd1=trim($pwd1);
        $pwd2=trim($pwd2);

        $newPwd=null;

        if($pwd1 && ($pwd1==$pwd2)) {
            $newPwd=md5($pwd1);
        }

        $sql="UPDATE users SET ";

        if($newPwd) {
            $sql.="`pwd`='{$newPwd}', ";
        }

        $sql.=" `name`='{$name}',
                `phone`='{$phone}',
                `address`='{$address}'
                 WHERE `email`='{$email}' AND `pwd`='{$curPwd}' LIMIT 1";             

        $rs=$this->sql($sql);

        return $rs;
    }


    /**
     * Функция получения данных о заказах пользователя
     * 
     */
    function getCurUserOrders() { 
        $userId=isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
        $rs=$this->MOrdersModel->getOrdersWithProductsByUser($userId);

        return $rs;
    }
}

$MUsersModel=new MUsersModel($MOrdersModel);