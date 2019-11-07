<?php
//volta para login se nao reconhecer usuario

if(!isset($_SESSION['usuario'])){
    $_SESSION['msg'] = 'Por favor, faça seu login.';
    header('location:index.php?pagina=login');
}
?>

<?php
require_once("classes/crud.php");
require_once("classes/polo.php");

//trata formulario
if(!empty($_POST["gravar"])){
    $polo = new Polo();
    $polo->setNome($_POST["nome"]);
    $polo->setEmail($_POST["email"]);
    $polo->setCidade($_POST["cidade"]);
    $polo->setUF($_POST["estado"]);
    $polo->setCep($_POST["cep"]);
    $polo->InsereAtualizaPolo($polo);
}

?>

<h1 class="heading">Cadastro dos Polos<br/>‍</h1>
<div class="container w-container">
    <div class="w-form">
        <form id="wf-form-frmPolos" name="wf-form-frmPolos" data-name="frmPolos" method="post" action="index.php?pagina=polos" onsubmit="return validaPolo(this);">
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
            <input type="text" class="w-input" maxlength="100" name="nome" onkeyup="maiuscula(this)" id="nome" required="" value="<?php echo $nome; ?>" <?php if(!empty($nome)){ echo "readonly='true'"; } ?>/>
            <label for="email">e-mail</label><input type="email" class="w-input" maxlength="100" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" value="<?php echo $email; ?>"/>
            <label for="cidade">Cidade</label><input type="text" class="w-input" maxlength="100" name="cidade" onkeyup="maiuscula(this)" id="cidade" required="" value="<?php echo $cidade; ?>"/>
            <label for="estado">Estado</label><input type="text" class="w-input" maxlength="2" name="estado" onkeyup="maiuscula(this)" id="estado" required="" value="<?php echo $estado; ?>"/>
            <label for="cep">CEP</label><input type="text" class="w-input" maxlength="8" name="cep" onkeypress="return somenteNumeros(event)" id="cep" pattern="[0-9]+$" required="" value="<?php echo $cep; ?>"/>
            <input type="submit" value="Gravar" data-wait="Por favor, aguardar..." class="submit-button w-button" name="gravar"/>
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
                echo "<tr style='font-size: 14px;'>";
                echo "<td style='padding: 3px 2px;'>".$linha["codigo"]."</td>";
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

