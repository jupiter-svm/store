<?php

/**
 * Модель для таблицы категорий (categories)
 * 
 */

//Получить главные категории с привязками дочерних
function getAllMainCatsWithChildren() {
    global $db;
    
    $sql='SELECT * FROM categories WHERE parent_id=0';
    
    $rs= mysqli_query($db, $sql);
    
    $smartyRs=array();
    
    while($row= mysqli_fetch_assoc($rs)) {
        $rsChildren=getChildrenForCat($row['id']);
        
        if($rsChildren) {
            $row['children']=$rsChildren;
        }
        
        $smartyRs[]=$row;
    }       
    
    return $smartyRs;
}


//** Выборка дочерних категорий
function getChildrenForCat($catId) {
    global $db;
    
    $sql="SELECT*FROM categories WHERE parent_id='{$catId}'";
    
    $rs=mysqli_query($db, $sql);   
    
    return createSmartyRsArray($rs);
}

/**
 * Получить данные по id
 */

function getCatById($catId) {
    global $db;
    
    $catId=intval($catId);
    
    $sql="SELECT * FROM categories WHERE id='{$catId}'";    
    
    $rs=mysqli_query($db, $sql);    
    
    return mysqli_fetch_assoc($rs);
}

/**
 * Получить все главные категории (категории, которые не являются дочерними) 
 */
function getAllMainCategories() {
    global $db;
    
    $sql="SELECT * FROM categories WHERE parent_id=0";
    
    $rs=mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Добавление новой категории
 * 
 * @param type $catName - название категории
 * @param type $catParentId - ID родительской категории
 */
function insertCat($catName, $catParentId=0) {
    global $db;
    
    $sql="INSERT INTO categories (`parent_id`, `name`) VALUES ('{$catParentId}', '{$catName}')";

    mysqli_query($db, $sql);
    
    $id=mysqli_insert_id($db);
    
    return $id;
}

/**
 * Добавление новой категории 
 */
function addnewcatAction() {
    $catName=$_POST['newCategoryName'];
    $catParentId=$_POST['generalCatId'];
    
    $res=insertCat($catName, $catParentId);
    
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
    global $db;
    
    $sql="SELECT * FROM categories ORDER BY parent_id ASC";
    
    $rs=mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Обновление категории
 * 
 * @param type $itemId - ID категории
 * @param type $parentId - ID главной категории
 * @param type $newName - новое имя категории
 */
function updateCategoryData($itemId, $parentId=-1, $newName='') {
    global $db;
    
    $set=array();
    
    if($newName) {
        $set[]="`name` = '{$newName}'";
    }
    
    if ($parentId>-1) {
        $set[]="`parent_id` = '{$parentId}'";
    }
    
    $setStr=implode($set, ", ");
    $sql="UPDATE categories SET {$setStr} WHERE id='{$itemId}'";   
    
    $rs=mysqli_query($db, $sql);
    
    return $rs;
}