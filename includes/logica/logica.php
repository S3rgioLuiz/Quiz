<?php

require_once("conecta.php");
require_once("funcoes.php");
require_once("../../email/envia_email.php");
session_start();

//********* CADASTRAR *********
if(isset($_POST['cadastrar'])){
    $apelido = $_POST['apelido'];
    $array = array($apelido);

    $existe = selecionarApelidoUsuario($conexao, $array);
    if($existe){
        $_SESSION['aviso'] = "Apelido já Existe!";
    } else {
        $email = $_POST['email'];
        $array = array($email);

        $existe = selecionarEmailUsuario($conexao, $array);

        if($existe){
            $_SESSION['aviso'] = "Email já Cadastrado!"; 
        } else{
            $nome = $_POST['nome'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
            $dados = array($apelido, $email, $nome, $senha);
            $cadastro = cadastrarUsuario($conexao, $dados);
    
            if($cadastro){
                $hash=md5($email);
                //$link="<a href='https://8ac6-3-88-200-190.ngrok-free.app/Tech/valida_email/email_cadastro.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
                //$link="<a href='https://sergiolrdr.duckdns.org/Tech/valida_email/email_cadastro.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
                $link="<a href='localhost/Quiz/valida_email/cadastro.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
                $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#FFFFFF'>";
                $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";
    
                $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
                $assunto="Confirme seu cadastro";
    
                $retorno= enviaEmail($email,$nome,$mensagem,$assunto);
            
                $_SESSION["aviso"]= "Valide o Cadastro no Email";
            } 
        }
    }
    header("Location:../../cadastro.php");
}

//********* ENTRAR *********
if(isset($_POST['entrar'])){
    
    $array = array($_POST['usuario']);

    if(strpos($array[0], '@')){
        $usuario = selecionarEmailUsuario($conexao, $array);
    } else {
        $usuario = selecionarApelidoUsuario($conexao, $array);
    }

    if(password_verify($_POST['senha'], $usuario['senha'])){
        if($usuario['status'] == 0){
            header("Location:../../index.php");
            $_SESSION['aviso'] = "Valide o Email!";
        } else {
            $_SESSION['logado'] = true;
            $_SESSION['codigo'] = $usuario['codigo'];
            $_SESSION['identificacao'] = ($usuario['status'] == 1) ? "comum" : "admin";
            header("Location:../../home.php");
        }
    } else {
        header("Location:../../index.php");
        $_SESSION['aviso'] = "Apelido/Email ou Senha Inválidos!";
    }
}

//********* RECUPERAR SENHA *********
if(isset($_POST['recuperar'])){
    $array = array($_POST['usuario']);
    $usuario = selecionarEmailUsuario($conexao, $array);
    if($usuario && $usuario['status'] > 0){
        $_SESSION['senha'] = true;
        $_SESSION['codigo'] = $usuario['codigo'];
        $hash=md5($usuario['email']);
        //$link="<a href='https://8ac6-3-88-200-190.ngrok-free.app/Tech/valida_email/email_senha.php?h=".$hash."'> Clique aqui para Recuperar Senha </a>";
        //$link="<a href='https://sergiolrdr.duckdns.org/Tech/valida_email/email_senha.php?h=".$hash."'> Clique aqui para Recuperar Senha </a>";
        $link="<a href='localhost/Quiz/valida_email/senha.php?h=".$hash."'> Clique aqui para recuperar sua senha </a>";
        $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#FFFFFF'>";
        $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";

        $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
        $assunto="Recuperar Senha";

        $retorno= enviaEmail($usuario['email'],$usuario['nome'],$mensagem,$assunto);
        
        $_SESSION["aviso"]= "Recupere a Senha pelo Email.";
    } else{
        $_SESSION['aviso'] = "Email Inexistente!";
    }
    header("Location:../../index.php");
}

//********* REDEFINIR SENHA *********
if(isset($_POST['redefinir'])){
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $array = array($senha, $_SESSION['codigo']);
    $alterar = redefinirSenha($conexao, $array);
    if($alterar){
        header("Location:../../index.php");
        unset($_SESSION['senha']);
        unset($_SESSION['codigo']);
        unset($_SESSION['recuperar']);
        $_SESSION['aviso'] = "Senha Alterada com Sucesso!";
    }else{
        header("Location:../../redefinir.php");
        $_SESSION['aviso'] = "Problema na Alteração!";
    }
}

//********* SAIR *********
if(isset($_POST['sair'])){
    session_start();
    session_destroy();
    header('location:../../index.php');
}

////********* ADICIONAR AMIGO *********
if(isset($_POST['adicionar'])){
   
    $array = array($_POST['apelido']);
    $apelido = selecionarApelidoUsuarioValido($conexao, $array);

    if($apelido){
        if($apelido['codigo'] != $_SESSION['codigo']){
            $array = array($_SESSION['codigo'], $apelido['codigo'], $_SESSION['codigo'], $apelido['codigo']);
            $verifica = amizadeExistente($conexao, $array);

            if($verifica){
                if($verifica['status'] == 1){
                    $_SESSION['aviso'] = "Vocês Já são Amigos!";
                } else if($verifica['remetente'] == $_SESSION['codigo']){
                    $_SESSION['aviso'] = "Você já Mandou Convite! Aguarde a Resposta!";
                } else if($verifica['destinatario'] == $_SESSION['codigo']){
                    $_SESSION['aviso'] = $apelido['apelido']." Já Enviou Convite para Você!";
                }
            } else {
                $array = array($_SESSION['codigo'], $apelido['codigo']);
                $enviar = adicionarAmigo($conexao, $array);

                if($enviar){
                    $_SESSION['aviso'] = "Pedido de Amizade Enviado com Sucesso!";
                } else {
                    $_SESSION['aviso'] = "Erro ao Enviar Pedido! Repita o Procedimento!";
                }
            }
        } else {
            $_SESSION['aviso'] = "Apelido Inválido!";
        }

    } else {
        $_SESSION['aviso'] = "Apelido Inexistente!";
    }
    header("Location:../../amizade.php");
}

//********* ACEITAR AMIZADE *********
if(isset($_POST['aceitar'])) {

    $array = array($_POST['codigo'], $_SESSION['codigo']);
    $aceitar = aceitarConviteAmizade($conexao, $array);

    $_SESSION['aviso'] = $aceitar ? "Convite Aceito com Sucesso!" : "ERRO: Repita o Procedimento!";
    header("Location:../../amizade.php");
}

//********* RECUSAR AMIZADE *********
if(isset($_POST['recusar'])) {

    $array = array($_POST['codigo'], $_SESSION['codigo']);
    $recusar = recusarConviteAmizade($conexao, $array);

    $_SESSION['aviso'] = $recusar ? "Convite Recusado!" : "ERRO: Repita o Procedimento!";
    header("Location:../../amizade.php");
}

//********* EXCLUIR AMIZADE *********
if(isset($_POST['excluir'])){
    $array = array($_POST['codigo'], $_SESSION['codigo'], $_POST['codigo'], $_SESSION['codigo']);
    $excluir = excluirAmigo($conexao, $array);

    $_SESSION['aviso'] = $excluir ? $_POST['apelido']." Foi Excluído!" : "ERRO! Repita o Procedimento.";
    header("Location:../../amizade.php");
}

//********* MÓDULO *********
if(isset($_POST['modulo'])){
    //****** ADICIONAR ****** 
    if($_POST['modulo'] == "adicionar"){

        $uid = uniqid();

        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        
        $nome_arquivo = $uid . '.' . $extensao;

        $tamanho_arquivo = $_FILES['arquivo']['size']; 
        $arquivo_temporario = $_FILES['arquivo']['tmp_name'];

        $array = array($_POST['nome'], $nome_arquivo, $_POST['descricao']);
    
        move_uploaded_file($arquivo_temporario, "../../imagens/$nome_arquivo");

        $adicionar = adicionarModulo($conexao, $array);
        if($adicionar) {
            $_SESSION["modulo"] = $adicionar;
            header("Location:../../configuracao.php");
            $_SESSION["aviso1"] = "Módulo Criado com Sucesso!";
        } else {
            header("Location:../../modulo.php");
            $_SESSION["aviso1"] = "ERRO - Repita o Procedimento.";
        }
    }
    //****** EDITAR ****** 
    else if($_POST['modulo'] == "editar") {
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        if(empty($extensao)){
            $array = array($_POST["nome"], $_POST["foto"], $_POST["descricao"], $_POST["codigo"]);
        } else {
            $uid = uniqid();
            $nome_arquivo = $uid . '.' . $extensao;
            $tamanho_arquivo = $_FILES['arquivo']['size']; 
            $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
            move_uploaded_file($arquivo_temporario, "../../imagens/$nome_arquivo");
            $array = array($_POST['nome'], $nome_arquivo, $_POST['descricao'], $_POST["codigo"] );
        }
        $editar = editarModulo($conexao, $array);
        if($editar) {
            header("Location:../../configuracao.php");
            $_SESSION["aviso1"] = "Módulo Atualizado com Sucesso!";
        } else {
            header("Location:../../configuracao.php");
            $_SESSION["aviso1"] = "ERRO - Repita o Procedimento.";
        }
    }
}

//********* CONFIGURACÃO *********
if(isset($_POST["configuracao"])){
    //****** ADICIONAR ******
    if($_POST["configuracao"] == "adicionar") {
        $array = array(number_format($_SESSION["modulo"]), number_format($_POST["tempo"]), 
        number_format($_POST["nivel1"]), number_format($_POST["nivel2"]), number_format($_POST["nivel3"]), 
        number_format($_POST["nivel4"]), number_format($_POST["nivel5"]));
        $configuracao = adicionarConfiguracao($conexao, $array);
        if($configuracao){
            $_SESSION["aviso2"] = "Configuração Criada com Sucesso!";
        } else {
            $_SESSION["aviso2"] = "ERRO - Repita o Procedimento.";
        }
        header("Location:../../configuracao.php");
    }
    else if($_POST["configuracao"] == "editar"){
        $array = array(number_format($_POST["tempo"]), number_format($_POST["nivel1"]), 
        number_format($_POST["nivel2"]), number_format($_POST["nivel3"]), 
        number_format($_POST["nivel4"]), number_format($_POST["nivel5"]), number_format($_POST["codigo"]));
        $configuracao = editarConfiguracao($conexao, $array);
        if($configuracao){
            $_SESSION["aviso2"] = "Configuração Editada com Sucesso!";
        } else {
            $_SESSION["aviso2"] = "ERRO - Repita o Procedimento.";
        }
        header("Location:../../configuracao.php");
    }
}

//********* ACESSAR *********
if(isset($_POST["acessar"])) {
    //****** MÓDULO ****** 
    if($_POST["acessar"] == "modulo"){
        $_SESSION["modulo"] = $_POST["codigo"];
        header("Location:../../configuracao.php");
    }
}


//********* SALVAR CÓDIGO MÓDULO P/ CARREGAMENTO QUESTÕES *********
if (isset($_POST['modulo_ajax'])) {
    $_SESSION['modulo'] = $_POST['modulo_ajax'];
    if($_SESSION["modulo"] == 1){
        include "../../lista.php";
    } else {
        include '../../niveis.php';
    }
}

//********* SALVAR NÍVEL PARA FILTRO DE QUESTÕES *********
if (isset($_POST['nivel'])) {
    $_SESSION['nivel'] = $_POST['nivel'];
    include '../../lista.php';
}

?>