<?php
header("Content-Type: text/html; charset=utf-8");
include("config/config.php");


?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Fael - Desenvolvimento Web</title>
    <link rel="stylesheet" type="text/css" href="<?php echo DIRCSS; ?>estilos.css">
</head>
<body>
<div class="topFaixa float w100">
    :: Login
</div>

<form name="formLogin" id="formLogin" action="" method="post">
    <div class="login float center">
        <input class="float w100 h40" type="text" id="usuario" placeholder="Digite seu usuário" required>
        <input class="float w100 h40" type="password" id="senha" placeholder="Digite sua senha" required>
        <input class="inlineBlock h40" type="submit" value="Entrar">
    </div>
</form>
<?php

?>
</body>
</html>