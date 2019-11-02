<?php
//volta para login se nao reconhecer usuario
session_start();

if(!isset($_SESSION['usuario'])){
    $_SESSION['msg'] = 'Por favor, faça seu login.';
    header('location:index.php?pagina=login');
}
?>

<h1 class="heading">Cadastro dos Alunos<br/>‍</h1>
<div class="container w-container">
    <div class="w-form">
        <form id="wf-form-frmAlunos" name="wf-form-frmAlunos" data-name="frmAlunos" method="post">
            <label for="codigo-3">Código</label><input type="number" class="w-input" maxlength="256" name="codigo" data-name="codigo" id="codigo-3"/>
            <label for="nome-3">Nome</label><input type="text" class="w-input" maxlength="256" name="nome" data-name="nome" id="nome-3" required=""/>
            <label for="sobrenome">Sobrenome</label><input type="text" class="w-input" maxlength="256" name="sobrenome" data-name="sobrenome" id="sobrenome"/>
            <label for="nascimento">Data nascimento</label><input type="text" class="w-input" maxlength="256" name="nascimento" data-name="nascimento" id="nascimento"/>
            <label for="cidade-2">Cidade</label><input type="text" class="w-input" maxlength="256" name="cidade" data-name="cidade" id="cidade-2"/>
            <label for="estado-3">Estado</label><input type="text" class="w-input" maxlength="256" name="estado" data-name="estado" id="estado-3"/>
            <input type="submit" value="Gravar" data-wait="Por favor, aguardar..." class="submit-button w-button"/>
        </form>
    </div>
</div>
