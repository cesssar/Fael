<?php

class Aluno{
    private $id;
    private $cpf;
    private $nome;
    private $sobrenome;
    private $nascimento;
    private $cidade;
    private $uf;

    public function getId(){ return $this->id; }
    public function setId($i){ $this->id = $i; }
    public function getCPF(){ return $this->cpf; }
    public function setCPF($c){ $this->cpf = $c; }
    public function getNome(){ return $this->nome; }
    public function setNome($n){ $this->nome = $n; }
    public function getSobrenome(){ return $this->sobrenome; }
    public function setSobrenome($s){ $this->sobrenome = $s; }
    public function getNascimento(){ return $this->nascimento; }
    public function setNascimento($nas){ $this->nascimento = $nas; }
    public function getCidade(){ return $this->cidade; }
    public function setCidade($ci){ $this->cidade = $ci; }
    public function getUF(){return $this->uf; }
    public function setUF($uf){ $this->uf = $uf; }

    
    public function getLista(){
        $con = new Crud();
        $resultado = $con->select("SELECT * FROM alunos ORDER BY id");
        return $resultado;
    }

    public function recuperaAluno($i){
        $con = new Crud();
        $s = "SELECT * FROM alunos WHERE id =".$i;
        $resultado = $con->select($s);
        if(count($resultado)>0){
            $row = $resultado[0];
            $this->id = $row['id'];
            $this->cpf = $row['cpf'];
            $this->nome = $row['nome'];
            $this->sobrenome = $row['sobrenome'];
            $this->nascimento = $row['nascimento'];
            $this->cidade = $row['cidade'];
            $this->uf = $row['uf'];
        }
    }

    public function InsereAtualizaAluno($objAluno){
        $con = new Crud();
        $s = "SELECT id FROM alunos WHERE cpf = '" . $objAluno->getCPF()."'";
        $resultado = $con->select($s);
        
        if(count($resultado) < 1){
            $sql = "INSERT INTO alunos(cpf,nome,sobrenome,nascimento,cidade,uf) VALUES('".$objAluno->getCPF();
            $sql = $sql."','".$objAluno->getNome();
            $sql = $sql."','".$objAluno->getSobrenome();
            $sql = $sql."','".$objAluno->getNascimento();
            $sql = $sql."','".$objAluno->getCidade();
            $sql = $sql."','".$objAluno->getUF();
            $sql = $sql."');";
            $con->executaQuery($sql);
        }else{
            $sql = "UPDATE alunos SET cpf=".$objAluno->getCPF();
            $sql = $sql.", nome='".$objAluno->getNome();
            $sql = $sql."', sobrenome='".$objAluno->getSobrenome();
            $sql  = $sql."', nascimento='".$objAluno->getNascimento();
            $sql = $sql."', cidade='".$objAluno->getCidade();
            $sql = $sql."', uf='".$objAluno->getUF();
            $linha = $resultado[0];
            $sql = $sql."' WHERE id=".$linha['id'];
            $con->executaQuery($sql);
        }
    }

    public function UpdateAluno($objAluno){
        $con = new Crud();
        $sql = "UPDATE alunos SET nome='".$objAluno->getNome();
        $sql = $sql."', sobrenome='".$objAluno->getSobrenome();
        $sql = $sql."', nascimento='".$objAluno->getNascimento();
        $sql = $sql."', cidade='".$objAluno->getCidade();
        $sql = $sql."', uf='".$objAluno->getUF();
        $sql = "' WHERE cpf=".$objAluno->getCPF();
        $r = $con->executaQuery($sql);
        return $r;
    }
}
?>