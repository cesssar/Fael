<?php
class Usuario{
    private $id;
    private $usuario;
    private $senha;

    public function getId(){ return $this->id; }

    public function setId($i){ $this->id = $i; }

    public function getUsuario(){ return $this->usuario; }

    public function setUsuario($u){ $this->usuario = $u; }

    public function getSenha(){ return $this->senha; }

    public function setSenha($s){ $this->senha = $s; }

    public function recuperaUsuario($usuario,$senha){
        $conn = new Crud();
        $resultado = $conn->select("SELECT * FROM usuarios WHERE usuario='".$usuario."' and senha='".$senha."'");
        if(count($resultado)>0){
            $row = $resultado[0];
            $this->setId($row['id']);
            $this->setUsuario($row['usuario']);
        }
    }

    public function InsereUsuario($usuario,$senha){
        $conn = new Crud();
        $resultado = $conn->select("SELECT id FROM usuarios WHERE usuario='".$usuario."'");
        if(count($resultado < 1)){
            $r = $conn->executaQuery("INSERT INTO usuarios(usuario,senha) VALUES('".$usuario."','".$senha."')");
            return $r;
        }
    }

    public function AlteraSenha($id, $senha){
        $conn = new Crud();
        $r = $conn->executaQuery("UPDATE usuarios SET senha='".$senha."' WHERE id=".$id);
    }
}
?>