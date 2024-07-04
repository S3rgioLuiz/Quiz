<?php
session_start();
include_once('../includes/logica/funcoes.php');
include_once('../includes/logica/conecta.php');
if($_GET['h']){
	$h=$_GET['h'];
    $_SESSION["aviso"]=''; //inicializa msg
    if($_SESSION['senha'] != NULL && $_SESSION['codigo'] != NULL){
        $_SESSION['recuperar'] = true;
        header("Location:../redefinir.php");
    } else {
        header("Location:../index.php");
        $_SESSION['aviso'] = "A Sessão Expirou! Repita o Procedimento!";
    }
	
}