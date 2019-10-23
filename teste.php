<?php

require_once "classes/crud.php";
require_once "classes/polos.php";

//$con = getConexao();

$usuario= "mariaaaa";
$senha = "teste";

//$classeCrud = new Crud();
//echo var_dump($classeCrud->insertUsuario($usuario,$senha));

//echo var_dump(selectUsuario($usuario,$senha,$con));
//echo var_dump(insertUpdatePolo('Centro','centro@steinmeier.com.br','Porto Alegre','RS','90020011',$con));

//echo var_dump(insertUpdateAluno('00201749009','Cesar','Steinmeier',19800320,'Porto Alegre','RS',$con));

//echo var_dump($classeCrud->select("SELECT * FROM usuarios;"));

$p = new Polos();
echo $p->getNome();
echo "<br>";
$p->setNome("Poa");
$p->setCidade("Porto Alegre");
$p->setEmail("cesar@steinmeier.com.br");
$p->setUF("RS");
$p->setCep("91360450");
//echo $p->getNome()."<br>";
echo "<pre>".var_dump($p->InserePolo($p))."</pre>";
$p = null;
?>