<?php
require_once "config/config.php";
require_once "classes/conexao.php";
require_once "classes/crudUsuario.php";

$con = crudUsuario::getInstancia(Conexao::getInstance());

$usuario= "tobias";
$senha = "ozzy";

echo $con->insertUsuario($usuario,$senha);

?>