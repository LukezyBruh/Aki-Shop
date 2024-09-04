<?php 
    try{
        $connect = new PDO('mysql:host=localhost; dbname=localhost; charset=utf8', 'root', '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch(PDOException $e){
        die($e->getMessage());
    }
?>
