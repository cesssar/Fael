<?php
//volta para login se nao reconhecer usuario

if(!isset($_SESSION['usuario'])){
    $_SESSION['msg'] = 'Por favor, faça seu login.';
    header('location:index.php?pagina=login');
}
?>

<?php
require_once("classes/crud.php");
require_once("classes/disciplina.php");
require_once("classes/polo.php");

//trata formulario
if(!empty($_POST["gravar"])){
    $disc = new Disciplina();
    $disc->setDisciplina($_POST['disciplina']);
    $disc->setProfessor($_POST['professor']);
    $disc->setPolo($_POST['polo']);
    $disc->InsereAtualizaDisciplina($disc);
}

?>

<h1 class="heading">Cadastro de Disciplinas<br/>‍</h1>
<div class="container w-container">
    <div class="w-form">
        <form id="wf-form-frmDisciplinas" name="wf-form-frmDisciplinas" data-name="frmDisciplinas" method="post" action="index.php?pagina=disciplinas" onsubmit="return validaDisciplina(this);">
            <?php
            //recupera dados da disciplina para edição
            $d = null;
            $codigo = null;
            $disciplina = null;
            $professor = null;
            $polo = null;
            if(!empty($_GET['codigo'])){
                $dd = new Disciplina();
                $dd->recuperaDisciplina($_GET['codigo']);
                $codigo = $dd->getCodigo();
                $disciplina = $dd->getDisciplina();
                $professor = $dd->getProfessor();
                $polo = $dd->getPolo();
            }
            ?>
            <label for="disciplina">Disciplina</label>
            <input type="text" class="w-input" maxlength="200" name="disciplina" onkeyup="maiuscula(this)" id="disciplina" required="" value="<?php echo $disciplina; ?>" <?php if(!empty($disciplina)){ echo "readonly='true'"; } ?>/>
            <label for="professor">Professor(a)</label><input type="text" class="w-input" maxlength="200" name="professor" onkeyup="maiuscula(this)" id="professor" required="" value="<?php echo $professor; ?>"/>
            <label for="polo">Polo</label>
            <select name="polo" class="w-select">
                <option value=''></option>
                <?php
                $polos = new Polo();
                $lista = $polos->getLista();
                foreach($lista as $row){
                    echo "<option value='";
                    echo $row["codigo"]."'";
                    if($polo == $row["codigo"]){ echo " selected "; }
                    echo ">";
                    echo $row["nome"];
                    echo "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Gravar" class="submit-button w-button" name="gravar"/>
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
            <th>Disciplina</th>
            <th>Professor</th>
            <th>Polo</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
        <?php
            $d = new Disciplina();
            $resultado = $d->getLista();
            $pl = new Polo();
            foreach($resultado as $linha){
                echo "<tr style='font-size: 14px;'>";
                echo "<td style='padding: 3px 2px;'>".$linha["codigo"]."</td>";
                echo "<td>".$linha["disciplina"]."</td>";
                echo "<td>".$linha["professor"]."</td>";
                echo "<td>";
                $pl->recuperaPolo($linha["polo"]);
                echo $pl->getnome();
                echo "</td>";
                echo "<td><a href='index.php?pagina=disciplinas&codigo=".$linha["codigo"]."'>editar</a></td>";
                echo "</tr>";
            }
        ?>
        </tr>
    </table>
</div>
