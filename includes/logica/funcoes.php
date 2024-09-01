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

#AMIZADE
function selecionarApelidoUsuarioValido($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM usuario WHERE upper(apelido)=? AND status=1");
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

#AMIZADE
function amizadeExistente($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM amizade WHERE (remetente=? AND destinatario=?) OR (destinatario=? AND remetente=?)");
        if($query->execute($array)){
            $amizade = $query->fetch(PDO::FETCH_ASSOC);
            return $amizade;
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#AMIZADE
function adicionarAmigo($conexao, $array){
    try
    {
        $query = $conexao->prepare("INSERT INTO amizade(remetente, destinatario) 
        VALUES(?,?)");
        $resultado = $query->execute($array);
        return $resultado;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#AMIZADE
function selecionarAmigos($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT usuario.codigo, usuario.apelido 
        FROM usuario WHERE usuario.codigo IN (
        SELECT amizade.destinatario FROM amizade 
        WHERE amizade.remetente=? AND amizade.status=1
        UNION
        SELECT amizade.remetente FROM amizade 
        WHERE amizade.destinatario=? AND amizade.status=1)
        ORDER BY usuario.nome");
        $query->execute($array);
        $amigos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $amigos;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#AMIZADE
function convitesRecebidos($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT usuario.codigo, usuario.apelido 
        FROM usuario JOIN amizade ON (amizade.remetente = usuario.codigo) 
        WHERE amizade.destinatario = ? AND amizade.status=0");
        $query->execute($array);
        $convites = $query->fetchAll(PDO::FETCH_ASSOC);
        return $convites;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#AMIZADE
function aceitarConviteAmizade($conexao, $array){
    try {
        $query = $conexao->prepare("UPDATE amizade set status = 1 
        WHERE remetente = ? AND destinatario = ?");
        $resultado = $query->execute($array);       
        return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#AMIZADE
function recusarConviteAmizade($conexao, $array){
    try
    {
        $query = $conexao->prepare("DELETE FROM amizade 
        WHERE remetente = ? AND destinatario = ?");
        $resultado = $query->execute($array);
        return $resultado;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#AMIZADE
function excluirAmigo($conexao, $array){
    try
    {
        $query = $conexao->prepare("DELETE FROM amizade 
        WHERE (remetente=? AND destinatario=?) OR (destinatario=? AND remetente=?)");
        $resultado = $query->execute($array);
        return $resultado;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#MODULOS
function selecionarModulosOcultos($conexao){
    try
    {
        $query = $conexao->prepare("SELECT codigo, foto, descricao FROM modulo WHERE status=0");
        $query->execute();
        $modulos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $modulos;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#MODULOS
function selecionarModulosVisiveis($conexao){
    try
    {
        $query = $conexao->prepare("SELECT codigo, foto, descricao FROM modulo WHERE status=1");
        $query->execute();
        $modulos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $modulos;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#MODULOS
function adicionarModulo($conexao, $array){
    try
    {
        $query = $conexao->prepare("INSERT INTO modulo(nome, foto, descricao) 
        VALUES(?,?,?)");
        $resultado = $query->execute($array);
        return $resultado;
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#MODULOS #CONFIGURACAO
function selecionarConfiguracao($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM configuracao WHERE codigo_modulo=?");
        if($query->execute($array)){
            $configuracao = $query->fetch(PDO::FETCH_ASSOC);
            return $configuracao;
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
}

#MODULOS
function selecionarModuloPorCodigo($conexao, $array){
    try
    {
        $query = $conexao->prepare("SELECT * FROM modulo WHERE codigo=?");
        if($query->execute($array)){
            $modulo = $query->fetch(PDO::FETCH_ASSOC);
            return $modulo;
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