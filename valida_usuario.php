<?php
session_start();

include('classes/crud.php');
include('classes/usuario.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if(!empty($usuario) && !empty($senha)){
    $usu = new Usuario();
    $usu->recuperaUsuario($usuario,$senha);
    if(strlen($usu->getUsuario())>0){
        $_SESSION['usuario'] = $usu->getUsuario();
        $_SESSION['id'] = $usu->getSenha();
        header('location:index.php?pagina=polos');
    }else{
        unset($_SESSION['id']);
        unset($_SESSION['usuario']);
        $_SESSION['msg'] = 'Dados para login incorretos.';
        header('location:index.php?pagina=login');
    }
}else{
    header('location:index.php?pagina=login');
}

?>