<?php

#acesso ao banco de dados
define('HOST',"localhost");
define('BD',"fael");
define('USER',"phpmyadmin");
define('PASS',"ozzy");

class Crud extends PDO{
    private $conexao;

    public function __construct(){
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
        $this->conexao = new PDO("mysql:host=" . HOST . "; dbname=" . BD . "; charset=utf8;", USER, PASS,$opcoes);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    private function executaQuery($sql){
        $query = $this->conexao->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    public function select($sql):array{
        $query = $this->conexao->query($sql);
        return $query->fetchall(PDO::FETCH_ASSOC);
    }
}

?>