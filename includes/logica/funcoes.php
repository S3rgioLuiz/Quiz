<?php

#CADASTRO #LOGIN
function selecionarApelidoUsuario($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM usuario WHERE upper(apelido)=?");
        if($query->execute($array)){
            $usuario = $query->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#CADASTRO #LOGIN #RECUPERAR
function selecionarEmailUsuario($conexao,$array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM usuario WHERE email=?");
        if($query->execute($array)){
            $usuario = $query->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#CADASTRO
function cadastrarUsuario($conexao, $array){
    try
    {
        $query = $conexao->prepare("INSERT INTO usuario(apelido, email, nome, senha) 
        VALUES(?,?,?,?)");
        $resultado = $query->execute($array);
        return $resultado;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#CADASTRO 
function selectUserEmailMd5($conexao,$array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM usuario WHERE md5(email)=?");
        if($query->execute($array)){
            $usuario = $query->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#CADASTRO
function alterarStatusUserUm($conexao, $array){
    try {
        $query = $conexao->prepare("UPDATE usuario set status = 1 where codigo = ?");
        $resultado = $query->execute($array);       
        return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#REDEFINIR
function redefinirSenha($conexao, $array){
    try {
        $query = $conexao->prepare("UPDATE usuario set senha = ? where codigo = ?");
        $resultado = $query->execute($array);       
        return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#HOME
function selecionarCodigoUsuario($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM usuario WHERE codigo=?");
        if($query->execute($array)){
            $usuario = $query->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

?>