<?php
//volta para login se nao reconhecer usuario
if(!isset($_SESSION['usuario'])){
    $_SESSION['msg'] = 'Por favor, faça seu login.';
    header('location:index.php?pagina=login');
}
?>

<?php
function getDataBR($dateSql){
    $ano= substr($dateSql, 0,4);
    $mes= substr($dateSql, 5,2);
    $dia= substr($dateSql, 8,2);
    return $dia.'/'.$mes.'/'.$ano;
}

function getDataMySql($dataBR){
    $ano= substr($dataBR,6,4);
    $mes= substr($dataBR,3,2);
    $dia= substr($dataBR,0,2);
    return $ano.'-'.$mes.'-'.$dia;
}

require_once("classes/crud.php");
require_once("classes/aluno.php");

//trata formulario
if(!empty($_POST["gravar"])){
    $aluno = new Aluno();
    $aluno->setCPF($_POST["cpf"]);
    $aluno->setNome($_POST["nome"]);
    $aluno->setSobrenome($_POST["sobrenome"]);
    $aluno->setNascimento(getDataMySql($_POST["nascimento"]));
    $aluno->setCidade($_POST["cidade"]);
    $aluno->setUF($_POST["estado"]);
    $aluno->InsereAtualizaAluno($aluno);
}
?>

<h1 class="heading">Cadastro de Alunos<br/>‍</h1>
<div class="container w-container">
    <div class="w-form">
        <form id="wf-form-frmAlunos" name="wf-form-frmAlunos" data-name="frmAlunos" method="post" onsubmit="return validaAluno(this);">
            <?php
            //recupera dados do aluno para edição
            $a = null;
            $cpf = null;
            $nome = null;
            $sobrenome = null;
            $nascimento = null;
            $cidade = null;
            $estado = null;
            if(!empty($_GET['id'])){
                $a = new Aluno();
                $a->recuperaAluno($_GET['id']);
                $cpf = $a->getCPF();
                $nome = $a->getnome();
                $sobrenome = $a->getSobrenome();
                $nascimento = $a->getNascimento();
                $cidade = $a->getCidade();
                $estado = $a->getUF();
            }
            ?>
            <label for="cpf">CPF</label><input type="text" class="w-input" maxlength="11" name="cpf" onkeyup="maiuscula(this)" id="cpf required="" value="<?php echo $cpf; ?>" <?php if(!empty($cpf)){ echo "readonly='true'"; } ?>/>
            <label for="nome">Nome</label><input type="text" class="w-input" maxlength="100" name="nome" onkeyup="maiuscula(this)" id="nome-3" required="" value="<?php echo $nome; ?>"/>
            <label for="sobrenome">Sobrenome</label><input type="text" class="w-input" maxlength="200" name="sobrenome" onkeyup="maiuscula(this)" id="sobrenome" value="<?php echo $sobrenome; ?>"/>
            <label for="nascimento">Data nascimento</label><input type="text" class="w-input" maxlength="10" name="nascimento" onkeyup="mascaraData(this)" id="nascimento" value="<?php if(!empty($nascimento)){ echo getDataBR($nascimento); } ?>"/>
            <label for="cidade">Cidade</label><input type="text" class="w-input" maxlength="100" name="cidade" onkeyup="maiuscula(this)" id="cidade" value="<?php echo $cidade; ?>"/>
            <label for="estado">Estado</label><input type="text" class="w-input" maxlength="2" name="estado" onkeyup="maiuscula(this)" id="estado" value="<?php echo $estado; ?>"/>
            <input type="submit" value="Gravar" name="gravar" class="submit-button w-button"/>
        </form>
    </div>
</div>

<div class="container w-container">
&nbsp;
</div>

<div class="container w-container">
    <table width="100%" style="border: 1px solid #1f683b; text-align: center; border-collapse: collapse;">
        <tr style="font-size: 15px; font-weight: bold; color: #FFFFFF; background: #1f683b;">
            <th style="padding: 3px 2px;">Código</th>
            <th>CPF</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Data Nascimento</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
        <?php
            $aa = new Aluno();
            $resultado = $aa->getLista();
            foreach($resultado as $linha){
                echo "<tr style='font-size: 14px;'>";
                echo "<td style='padding: 3px 2px;'>".$linha["id"]."</td>";
                echo "<td>".$linha["cpf"]."</td>";
                echo "<td>".$linha["nome"]."</td>";
                echo "<td>".$linha["sobrenome"]."</td>";
                echo "<td>".getDataBR($linha["nascimento"])."</td>";
                echo "<td>".$linha["cidade"]."</td>";
                echo "<td>".$linha["uf"]."</td>";
                echo "<td><a href='index.php?pagina=alunos&id=".$linha["id"]."'>editar</a></td>";
                echo "</tr>";
            }
        ?>
        </tr>
    </table>
</div>
