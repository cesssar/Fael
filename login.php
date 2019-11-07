<?php
session_start();

if($_SESSION['usuario']!=""){
    header('location:index.php?pagina=polos');
}
?>

<div class="container w-container">
                <div class="sign-up-form w-form">
                    <form name="frmLogin" class="w-clearfix" action="valida_usuario.php" method="post" onsubmit="return validar(this);">
                    <input type="text" name="usuario" onkeyup="maiuscula(this)" placeholder="Digite seu usuário" maxlength="256" required="" id="usuario" class="field w-input"/>
                    <input type="password" name="senha" placeholder="Digite sua senha" maxlength="256" required="" id="senha" class="field w-input"/>
                    <input type="submit" value="Entrar" class="button w-button"/>
                    </form>
                </div>
                <?php
                if(!empty($_SESSION['msg'])){
                    echo '<pre>'.$_SESSION['msg'].'</pre>';
                    unset($_SESSION['msg']);
                }
                ?>
</div>