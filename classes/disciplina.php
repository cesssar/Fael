<?php

class Disciplina{
    private $codigo;
    private $disciplina;
    private $professor;
    private $polo;

    public function getCodigo(){ return $this->codigo; }
    public function getDisciplina(){ return $this->disciplina; }
    public function getProfessor(){ return $this->professor; }
    public function getPolo(){ return $this->polo; }

    public function setCodigo($c){ $this->codigo = $c; }
    public function setDisciplina($d){ $this->disciplina = $d; }
    public function setProfessor($p){ $this->professor = $p; }
    public function setPolo($polo){ $this->polo = $polo; }

    public function recuperaDisciplina($i){
        $con = new Crud();
        $resultado = $con->select("SELECT * FROM disciplinas WHERE codigo=".$i);
        if(count($resultado) > 0 ){
            $row = $resultado[0];
            $this->codigo = $row['codigo'];
            $this->disciplina = $row['disciplina'];
            $this->professor = $row['professor'];
            $this->polo = $row['polo'];
        }
    }

    public function InsereAtualizaDisciplina($obj){
        $con = new Crud();
        $resultado = $con->select("SELECT codigo FROM disciplinas WHERE disciplina like '%".$obj->getDisciplina()."%'");
        if(count($resultado) < 1){
            $sql = "INSERT INTO disciplinas(disciplina,professor,polo) VALUES('".$obj->getDisciplina();
            $sql = $sql."','".$obj->getProfessor();
            $sql = $sql."',".$obj->getPolo();
            $sql = $sql.")";
            $con->executaQuery($sql);
        }else{
            $sql = "UPDATE disciplinas SET disciplina='".$obj->getDisciplina();
            $sql = $sql."', professor='".$obj->getProfessor();
            $sql = $sql."', polo=".$obj->getPolo();
            $sql = $sql." WHERE codigo=";
            $linha = $resultado[0];
            $sql = $sql.$linha['codigo'];
            $con->executaQuery($sql);
        }
    }

    public function getLista(){
        $con = new Crud();
        $resultado = $con->select("SELECT * FROM disciplinas ORDER BY codigo");
        return $resultado;
    }
}
?>