<?php
//volta para login se nao reconhecer usuario
session_start();

if(!isset($_SESSION['usuario'])){
    $_SESSION['msg'] = 'Por favor, faça seu login.';
    header('location:index.php?pagina=login');
}
?>

<?php
require_once("classes/crud.php");
require_once("classes/disciplina.php");

//trata formulario
if(!empty($_POST["gravar"])){
    $disc = new Disciplina();
    $disc->setDisciplina($_POST['disciplina']);
    $disc->setProfessor($_POST['professor']);
    $disc->setPolo($_POST['polo']);
    $disc->InsereAtualizaDisciplina($disc);
}

?>

<h1 class="heading">Cadastro dos Polos Fael<br/>‍</h1>
<div class="container w-container">
    <div class="w-form">
        <form id="wf-form-frmPolos" name="wf-form-frmPolos" data-name="frmPolos" method="post" action="index.php?pagina=polos">
            <?php
            //recupera dados do polo para edição
            $pp = null;
            $nome = null;
            $email = null;
            $cidade = null;
            $estado = null;
            $cep = null;
            if(!empty($_GET['codigo'])){
                $pp = new Polo();
                $pp->recuperaPolo($_GET['codigo']);
                $nome = $pp->getNome();
                $email = $pp->getEmail();
                $cidade = $pp->getCidade();
                $estado = $pp->getUF();
                $cep = $pp->getCEP();
            }
            ?>
            <label for="nome">Nome do Polo</label>
            <input type="text" class="w-input" maxlength="100" name="nome" data-name="nome" id="nome" required="" value="<?php echo $nome; ?>" <?php if(!empty($nome)){ echo "readonly='true'"; } ?>/>
            <label for="email">e-mail</label><input type="email" class="w-input" maxlength="100" name="email" data-name="email" id="email" required="" value="<?php echo $email; ?>"/>
            <label for="cidade">Cidade</label><input type="text" class="w-input" maxlength="100" name="cidade" data-name="cidade" id="cidade" required="" value="<?php echo $cidade; ?>"/>
            <label for="estado">Estado</label><input type="text" class="w-input" maxlength="2" name="estado" data-name="estado" id="estado" required="" value="<?php echo $estado; ?>"/>
            <label for="cep">CEP</label><input type="text" class="w-input" maxlength="8" name="cep" data-name="cep" id="cep" required="" value="<?php echo $cep; ?>"/>
            <input type="submit" value="Gravar" data-wait="Por favor, aguardar..." class="submit-button w-button" name="gravar"/>
        </form>
    </div>
</div>

<div class="container w-container">
    <table>
        <tr>
            <th>Código</th>
            <th>Nome do Polo</th>
            <th>e-mail</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
        <?php
            $p = new Polo();
            $resultado = $p->getLista();
            foreach($resultado as $linha){
                echo "<tr>";
                echo "<td>".$linha["codigo"]."</td>";
                echo "<td>".$linha["nome"]."</td>";
                echo "<td>".$linha["email"]."</td>";
                echo "<td>".$linha["cidade"]."</td>";
                echo "<td>".$linha["uf"]."</td>";
                echo "<td>".$linha["cep"]."</td>";
                echo "<td><a href='index.php?pagina=polos&codigo=".$linha["codigo"]."'>editar</a></td>";
                echo "</tr>";
            }
        ?>
        </tr>
    </table>
</div>
