<?php

#acesso ao banco de dados
define('HOST',"localhost");
define('BD',"fael");
define('USER',"phpmyadmin");
define('PASS',"ozzy");

function getConexao(){
    try{
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);   
        $pdo = new PDO("mysql:host=" . HOST . "; dbname=" . BD . "; charset=utf8;", USER, PASS, $opcoes);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $pdo;     
    }catch (PDOException $e){
        return $e->getMessage();
    }
}


?>