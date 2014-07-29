<?php
/**
 * Модель для таблицы категорий (categories)
 * 
 */

class MCategoriesModel extends Db {   
    
    function __construct() {
        parent::__construct();
    }
    
    //Получить главные категории с привязками дочерних 
    function getAllMainCatsWithChildren() {       

        $sql='SELECT * FROM categories WHERE parent_id=0';

        $rs=$this->sql($sql);

        $smartyRs=array();

        while($row=mysqli_fetch_assoc($rs)) {
            $rsChildren=$this->getChildrenForCat($row['id']);

            if($rsChildren) {
                $row['children']=$rsChildren;
            }

            $smartyRs[]=$row;
        }       
        
        return $smartyRs;
    }


    //** Выборка дочерних категорий
    function getChildrenForCat($catId) {
        $sql="SELECT*FROM categories WHERE parent_id='{$catId}'";

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * Получить данные категории по id
     */
    function getCatById($catId) {        

        $catId=intval($catId);

        $sql="SELECT * FROM categories WHERE id='{$catId}'";    

        $rs=$this->sql($sql);    

        return mysqli_fetch_assoc($rs);
    }

    /**
     * Получить все главные категории (категории, которые не являются дочерними) 
     */
    function getAllMainCategories() {
        $sql="SELECT * FROM categories WHERE parent_id=0";

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * Добавление новой категории
     * 
     * @param type $catName - название категории
     * @param type $catParentId - ID родительской категории
     */
    function insertCat($catName, $catParentId=0) {
        $sql="INSERT INTO categories (`parent_id`, `name`) VALUES ('{$catParentId}', '{$catName}')";

        $this->sql($sql);

        $id=mysqli_insert_id($this->getConnection());

        return $id;
    }

    /**
     * Добавление новой категории 
     */
    function addnewcatAction() {
        $catName=$_POST['newCategoryName'];
        $catParentId=$_POST['generalCatId'];

        $res=$this->insertCat($catName, $catParentId);

        if($res) {
            $resData['success']=1;
            $resData['message']='Категория добавлена';
        } else {
            $resData['success']=0;
            $resData['message']='Ошибка добавления категории';
        }

        echo json_encode($resData);
    }

    /**
     * Получить все категории
     * 
     * @global type $db - подключаю БД
     * @return type
     */
    function getAllCategories() {
        $sql="SELECT * FROM categories ORDER BY parent_id ASC";

        $rs=$this->sql($sql);

        return MFunctions::createSmartyRsArray($rs);
    }

    /**
     * Обновление категории
     * 
     * @param type $itemId - ID категории
     * @param type $parentId - ID главной категории
     * @param type $newName - новое имя категории
     */
    function updateCategoryData($itemId, $parentId=-1, $newName='') {
        $set=array();

        if($newName) {
            $set[]="`name` = '{$newName}'";
        }

        if ($parentId>-1) {
            $set[]="`parent_id` = '{$parentId}'";
        }

        $setStr=implode($set, ", ");
        $sql="UPDATE categories SET {$setStr} WHERE id='{$itemId}'";   

        $rs=$this->sql($sql);

        return $rs;
    }
}

$MCategoriesModel=new MCategoriesModel();