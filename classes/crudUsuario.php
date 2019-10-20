<?php

class crudUsuario{
    private $pdo = null;

    private static $crudUsuario = null;

    private function __construct($conexao){
        $this->pdo = $conexao;
    }

    //retorna objeto da classe
    public static function getInstancia($conexao){
        if(!isset(self::$crudUsuario)):
            self::$crudUsuario = new crudUsuario($conexao);
        endif;
        return self::$crudUsuario;
    }

    public function insertUsuario($usuario, $senha){
        if(!empty($usuario) && !empty($senha)):
            try{
                $sqlU = "SELECT * FROM usuarios WHERE usuario=?";
                $query = $this->pdo->prepare($sqlU);
                $query->bindValue(1,$usuario);
                $query->execute();
                return $query->count;
                if ($query->count < 1):
                    $sql = "INSERT INTO usuarios(usuario,senha) VALUES(?,?)";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1,$usuario);
                    $stm->bindValue(2,$senha);
                    $stm->execute();
                endif;
                $query->NULL;
            }catch (PDOException $erro){
                return $erro->getLine();
            }
        endif;
    }

}

?>