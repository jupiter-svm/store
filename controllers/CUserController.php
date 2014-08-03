<?php

/* 
 * Контроллер пользователей (/user/)
 * 
 */

include_once '../models/MCategoriesModel.php';
include_once '../models/MOrdersModel.php';
include_once '../models/MUsersModel.php';
include_once '../models/MPurchaseModel.php';

class CUserController {
    private $MCategoriesModel;
    private $MUsersModel;
    private $MOrdersModel;
    private $MPurchaseModel;
    
    function __construct($MCategoriesModel, $MUsersModel, $MOrdersModel, $MPurchaseModel) {
        $this->MCategoriesModel=$MCategoriesModel;
        $this->MUsersModel=$MUsersModel;
        $this->MOrdersModel=$MOrdersModel;
        $this->MPurchaseModel=$MPurchaseModel;
    }
    
    /**
     * AJAX регистрация пользователя
     * Инициализация сессионной переменной ($_SESSION['user'])
     * 
     */
    function registerAction() {
        $email=isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $email=trim($email);

        $pwd1=isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
        $pwd2=isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

        $phone=isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
        $address=isset($_REQUEST['address']) ? $_REQUEST['address'] : null;

        $name=isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
        $name=trim($name);

        $resData=null;
        $resData=$this->MUsersModel->checkRegisterParams($email, $pwd1, $pwd2);

        if(!$resData && $this->MUsersModel->checkUserEmail($email)) {
            $resData['success']=false;
            $resData['message']="Пользователь с таким e-mail({$email}) уже зарегистрирован";
        }

        if(!$resData) {
            $pwdMD5=md5($pwd1);

            $userData=$this->MUsersModel->registerNewUser($email, $pwdMD5, $name, $phone, $address);

            if($userData['success']) {
                $resData['message']='Пользователь успешно зарегистрирован';
                $resData['success']=1;

                $userData=$userData[0];
                $resData['userName']=$userData['name'] ? $userData['name'] : $userData['email'];
                $resData['userEmail']=$email;

                $_SESSION['user']=$userData;
                $_SESSION['user']['displayName']=$userData['name'] ? $userData['name'] : $userData['email'];
            } else {
                $resData['success']=0;
                $resData['message']='Ошибка регистрации';
            }
        }

        echo json_encode($resData);
    }


    /**
     * Разлогинивание пользователя
     * 
     */
    function logoutAction() {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
        }

        MFunctions::redirect('/');
    }

    /**
     * AJAX авторизация пользователя
     * 
     */
    function loginAction() {
        $email=isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $email=trim($email);

        $pwd=isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
        $pwd=trim($pwd);

        $userData=$this->MUsersModel->loginUser($email, $pwd);

        if($userData['success']) {
            $userData=$userData[0];        

            $_SESSION['user']=$userData;
            $_SESSION['user']['displayName']=$userData['name'] ? $userData['name'] : $userData['email'];
            $_SESSION['user']['role']=$userData['role'];

            $resData=$_SESSION['user'];
            $resData['success']=1;
            $resData['role']=$userData['role'];
        } else {
            $resData['success']=0;
            $resData['message']='Неверный логин и пароль';
        }

        echo json_encode($resData);
    }

    /**
     * Формирование главной страницы пользователя (/user/)
     * 
     * @param type $smarty - шаблонизатор
     */
    function indexAction($config) {

        //Если пользователь не авторизован, то редирект на главную страницу
        if(!isset($_SESSION['user'])) {
            MFunctions::redirect('/');
        }

        //Получаем список категорий для меню
        $rsCategories=$this->MCategoriesModel->getAllMainCatsWithChildren();

        //Получаем список заказов и их позиций для пользователя
        $rsUserOrders=$this->MUsersModel->getCurUserOrders();       

        $config->assign('pageTitle', 'Страница пользователя');
        $config->assign('rsCategories', $rsCategories);
        $config->assign('rsUserOrders', $rsUserOrders);

        MFunctions::loadTemplate($config, 'header');
        MFunctions::loadTemplate($config, 'user');
        MFunctions::loadTemplate($config, 'footer');
    }

    /**
     * Обновление данных пользователя
     * 
     * 
     */
    function updateAction() {

        //Если пользователь не залогинен, то выходим
        if(!isset($_SESSION['user'])) {
            redirect('/');
        }

        //Инициализация переменных
        $resData=array();

        $phone=isset($_REQUEST['newPhone']) ? $_REQUEST['newPhone'] : null;
        $address=isset($_REQUEST['newAddress']) ? $_REQUEST['newAddress'] : null;
        $name=isset($_REQUEST['newName']) ? $_REQUEST['newName'] : null;
        $pwd1=isset($_REQUEST['newPwd1']) ? $_REQUEST['newPwd1'] : null;
        $pwd2=isset($_REQUEST['newPwd2']) ? $_REQUEST['newPwd2'] : null;
        $curPwd=isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;

        //Проверка правильности пароля (введённый и тот, под которым залогинились)
        $curPwdMD5=md5($curPwd);

        if(!$curPwd || ($_SESSION['user']['pwd']!=$curPwdMD5)) {
            $resData['success']=0;
            $resData['message']='Текущий пароль не верный';

            echo json_encode($resData);

            return false;
        }

        //Обновление данных пользователя

        $res=$this->MUsersModel->updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwdMD5);

        if($res) {
            $resData['success']=1;
            $resData['message']='Данные сохранены';
            $resData['userName']=$name;

            $_SESSION['user']['name']=$name;
            $_SESSION['user']['phone']=$phone;
            $_SESSION['user']['address']=$address;

            if($pwd1 && ($pwd1==$pwd2)) {
                $_SESSION['user']['pwd']=md5($pwd1);
             }

            $_SESSION['user']['displayName']=$name ? $name : $_SESSION['user']['email'];
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка сохранения данных';
        }

        echo json_encode($resData);
    }
}

$CPageController=new CUserController($MCategoriesModel, $MUsersModel, $MOrdersModel, $MPurchaseModel);