<?php

class Polo{
    private $codigo;
    private $nome;
    private $email;
    private $cidade;
    private $uf;
    private $cep;

    public function getCodigo(){    return $this->codigo;   }
    public function getNome(){      return $this->nome;     }
    public function getEmail(){     return $this->email;    }
    public function getCidade(){    return $this->cidade;   }
    public function getUF(){        return $this->uf;       }
    public function getCep(){       return $this->cep;      }

    public function setNome($n){    $this->nome = $n;       }
    public function setEmail($e){   $this->email = $e;      }
    public function setCidade($c){  $this->cidade = $c;     }
    public function setUF($uf){     $this->uf = $uf;        }
    public function setCep($cep){   $this->cep = $cep;      }

    public function recuperaPolo($i){
        $con = new Crud();
        $resultado = $con->select("SELECT * FROM polos WHERE codigo=".$i);
        if(count($resultado) > 0 ){
            $row = $resultado[0];
            $this->codigo = $row['codigo'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->cidade = $row['cidade'];
            $this->uf = $row['uf'];
            $this->cep = $row['cep'];
        }
    }

    public function InsereAtualizaPolo($objPolo){
        $con = new Crud();
        $resultado = $con->select("SELECT codigo FROM polos WHERE nome like '%".$objPolo->getNome()."%'");
        if(count($resultado) < 1){
            $sql = "INSERT INTO polos(nome,email,cidade,uf,cep) VALUES('".$objPolo->getNome();
            $sql = $sql."','".$objPolo->getEmail();
            $sql = $sql."','".$objPolo->getCidade();
            $sql = $sql."','".$objPolo->getUF();
            $sql = $sql."','".$objPolo->getCep();
            $sql = $sql."')";
            $con->executaQuery($sql);
        }else{
            $sql = "UPDATE polos SET nome='".$objPolo->getNome();
            $sql = $sql."', email='".$objPolo->getEmail();
            $sql = $sql."', cidade='".$objPolo->getCidade();
            $sql = $sql."', uf='".$objPolo->getUF();
            $sql = $sql."', cep='".$objPolo->getCep()."' WHERE codigo=";
            $linha = $resultado[0];
            $sql = $sql.$linha['codigo'];
            $con->executaQuery($sql);
        }
    }

    public function getLista(){
        $con = new Crud();
        $resultado = $con->select("SELECT * FROM polos ORDER BY nome");
        return $resultado;
    }
}
?>