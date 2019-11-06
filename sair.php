<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['usuario']);
$_SESSION['msg'] = 'Sessão encerrada.';
header('location:index.php?pagina=login');
?>