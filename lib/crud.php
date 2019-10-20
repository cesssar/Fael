<?php

function insertUsuario($usuario, $senha, $conexao){
    if(!empty($usuario) && !empty($senha)){
        try{
            $sqlU = "SELECT * FROM usuarios WHERE usuario='".$usuario."'";
            $query = $conexao->prepare($sqlU);
            $query->execute();
            if ($query->rowCount() < 1){
                $sql = "INSERT INTO usuarios(usuario,senha) VALUES('".$usuario."','".$senha."')";
                $stm = $conexao->prepare($sql);
                $stm->execute();
                return true;
            }else{
                return false;
            }
            $query->NULL;
        }catch (PDOException $erro){
            return false;
        }
    }
}

function updateSenha($usuario,$senha,$conexao){
    if(!empty($usuario) && !empty($senha)){
        try{
            $sql = "UPDATE usuarios SET senha=:senha WHERE usuario=:usuario";
            $query = $conexao->prepare($sql);
            $query->execute(array(
                ':senha' => $senha,
                ':usuario' => $usuario
            ));
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch (PDOException $erro){
            return false;
        }
    }
}

function selectUsuario($usuario,$senha,$conexao){
    if(!empty($usuario) && !empty($senha)){
        try{
            $sql = "SELECT id FROM usuarios WHERE usuario='".$usuario."' AND senha='".$senha."'";
            $query = $conexao->query($sql);
            $linha = $query->fetch(PDO::FETCH_ASSOC);
            return $linha['id'];
        }catch (PDOException $erro){
            return NULL;
        }
    }
}

function insertUpdatePolo($polo, $email, $cidade, $uf, $cep, $conexao){
    if(!empty($polo) && !empty($email) && !empty($cidade) && !empty($uf) && !empty($cep)){
        try{
            $sqlU = "SELECT * FROM polos WHERE nome='".$polo."'";
            $query = $conexao->prepare($sqlU);
            $query->execute();
            if ($query->rowCount() < 1){
                $sql = "INSERT INTO polos(nome,email,cidade,uf,cep) VALUES(:polo,:email,:cidade,:uf,:cep)";
                $queryIn = $conexao->prepare($sql);
                $queryIn->execute(array(
                    ':polo' => $polo,
                    ':email' => $email,
                    ':cidade' => $cidade,
                    ':uf' => $uf,
                    ':cep' => $cep
                ));
                return true;
            }
            else{
                $sql = "UPDATE polos SET nome=:polo, email=:email, cidade=:cidade, uf=:uf, cep=:cep WHERE nome=:nome";
                $queryUp = $conexao->prepare($sql);
                $queryUp->execute(array(
                    ':polo' => $polo,
                    ':email' => $email,
                    ':cidade' => $cidade,
                    ':uf' => $uf,
                    ':cep' => $cep,
                    ':nome' => $polo
                ));
                return true;
            }
            $query->NULL;
        }catch (PDOException $erro){
            return false;
        }
    }
}

/*
CPF
Nome
Sobrenome
Nascimento
Cidade
Estado
*/

function insertUpdateAluno($cpf, $nome, $sobrenome, $nascimento, $cidade, $estado, $conexao){
    if(!empty($cpf) && !empty($nome) && !empty($sobrenome) && !empty($nascimento) && !empty($cidade) && !empty($estado)){
        try{
            $sqlU = "SELECT * FROM alunos WHERE cpf='".$cpf."'";
            $query = $conexao->prepare($sqlU);
            $query->execute();
            if ($query->rowCount() < 1){
                $sql = "INSERT INTO alunos(cpf,nome,sobrenome,nascimento,cidade,estado) VALUES(:cpf,:nome,:sobrenome,:nascimento,:cidade,:estado)";
                $queryIn = $conexao->prepare($sql);
                $queryIn->execute(array(
                    ':cpf' => $cpf,
                    ':nome' => $nome,
                    ':sobrenome' => $sobrenome,
                    ':nascimento' => $nascimento,
                    ':cidade' => $cidade,
                    ':estado' => $estado
                ));
                return true;
            }
            else{
                $sql = "UPDATE alunos SET cpf=:cpf, nome=:nome, sobrenome=:sobrenome, nascimento=:nascimento, cidade=:cidade, estado=:estado WHERE cpf=:cpf";
                $queryUp = $conexao->prepare($sql);
                $queryUp->execute(array(
                    ':cpf' => $cpf,
                    ':nome' => $nome,
                    ':sobrenome' => $sobrenome,
                    ':nascimento' => $nascimento,
                    ':cidade' => $cidade,
                    ':estado' => $estado
                ));
                return true;
            }
            $query->NULL;
        }catch (PDOException $erro){
            return false;
        }
    }
}


?>