<?php

class Polos{

}
class Usuario{
    private $codigo;
    private $nome;
    private $email;
    private $cidade;
    private $estado;
    private $cep;

    public function getCodigo(){    return $this->codigo;   }
    public function getNome(){      return $this->nome;     }
    public function getEmail(){     return $this->email;    }
    public function getCidade(){    return $this->cidade;   }
    public function getEstado(){    return $this->estado;   }
    public function getCep(){       return $this->cep;      }

    public function setNome($n){    $this->nome = $n;       }
    public function setEmail($e){   $this->email = $e;      }
    public function setCidade($c){  $this->cidade = $c;     }
    public function setEstado($uf){ $this->estado = $uf;    }
    public function setCep($cep){   $this->cep = $cep;      }


    /*
    public function recuperaUsuario($i){
        $conn = new Crud();
        $resultado = $conn->select("SELECT * FROM usuarios WHERE id=".$i);
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
    */
}
?>