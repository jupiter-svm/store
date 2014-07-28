<?php

include_once 'config.php';

/**
 * Класс подключения к базе данных
 */
class Db extends Config {  
    
    private $connection;
    
    //
    function  __construct() {   
        $this->open_connection();
    }
        
    private function open_connection() {
        $this->connection=mysqli_connect($this->dblocation, $this->dbuser, $this->dbpasswd);
    
        if(!$this->connection) {
            echo 'Ошибка доступа к MySQL';
            exit();
        } else {
            $db_select=mysqli_select_db($this->connection, $this->dbname);
            
            if(!db_select) {
                echo 'Не удалось выбрать БД';
                exit();
            }
        }

        mysqli_set_charset($this->connection, 'UTF8') or die('Не удалось установить кодовую страницу UTF-8');        
    }
    
    //Получение дескриптора подключения к БД
    function getConnection() {
        return $this->connection;
    }
    
    public function sql($query) {
        $result=mysqli_query($this->connection, $query);
        
        return $result;
    }
}    