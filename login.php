<script src="lib/js/login.js" type="text/javascript"></script>

<div class="container w-container">
                <div class="sign-up-form w-form">
                    <form name="frmLogin" class="w-clearfix" action="valida_usuario.php" method="post">
                    <input type="text" name="usuario" data-name="usuario" placeholder="Digite seu usuário" maxlength="256" required="" id="usuario" class="field w-input"/>
                    <input type="password" name="senha" data-name="senha" placeholder="Digite sua senha" maxlength="256" required="" id="senha" class="field w-input"/>
                    <input type="button" value="Entrar" class="button w-button" onclick="validaLogin()"/>
                    </form>
                </div>
                <?php
                session_start();
                if(!empty($_SESSION['msg'])){
                    echo '<pre>'.$_SESSION['msg'].'</pre>';
                    unset($_SESSION['msg']);
                }
                ?>
</div>