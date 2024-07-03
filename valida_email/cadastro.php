<?php
session_start();
include_once('../includes/logica/funcoes.php');
include_once('../includes/logica/conecta.php');
if($_GET['h']){
	$h=$_GET['h'];
    $_SESSION["aviso"]=''; //inicializa msg
	

	$array = array($h);

	$linha=selectUserEmailMd5($conexao,$array);
	if($linha){
		$array=array($linha['codigo']);
		$retorno=alterarStatusUserUm($conexao,$array);
		if($retorno){
			$_SESSION["aviso"]= "Cadastro Validado - Entre com seu Email e Senha";
		}
		else{
			$_SESSION["aviso"]= 'Problema na Validação';
		}	
	}
	else{
		$_SESSION["aviso"]= 'Problema na Validação';
	}
	header("Location:../index.php");	
	
	
}