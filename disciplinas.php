<?php
//volta para login se nao reconhecer usuario
session_start();

if(!isset($_SESSION['usuario'])){
    $_SESSION['msg'] = 'Por favor, faça seu login.';
    header('location:index.php?pagina=login');
}
?>

<h1 class="heading">Cadastro das Disciplinas</h1>
<div class="container w-container">
    <div class="w-form">
        <form id="wf-form-frmAlunos" name="wf-form-frmAlunos" data-name="frmAlunos" method="post">
        <label for="codigo-5">Código</label><input type="number" class="w-input" maxlength="256" name="codigo" data-name="codigo" id="codigo-5"/>
        <label for="disciplina">Disciplina</label><input type="text" class="w-input" maxlength="256" name="disciplina" data-name="disciplina" id="disciplina" required=""/>
        <label for="professor">Professor(a)</label><input type="text" class="w-input" maxlength="256" name="professor" data-name="professor" id="professor"/>
        <label for="polo">Polo</label>
            <select id="polo" name="polo" data-name="polo" class="w-select">
                <option value="">Select one...</option>
                <option value="First">First Choice</option>
                <option value="Second">Second Choice</option>
                <option value="Third">Third Choice</option>
            </select>
        <input type="submit" value="Gravar" data-wait="Por favor, aguardar..." class="submit-button w-button"/>
        </form>
    </div>
</div>
