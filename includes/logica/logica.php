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
                $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";
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


?>