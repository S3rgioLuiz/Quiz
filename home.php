<?php

    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();

    if(!$_SESSION['logado'])
        header("Location:index.php");


    $array = array($_SESSION['codigo']);
    $usuario = selecionarCodigoUsuario($conexao, $array); 

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/home.css" media="screen"/>
  </head>
  <body class="corpo">

        <div class="container align-items-center">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="menu">
                        <div class="logo"> <img src="imagens/logo.png"> </div>
                        <div class="itens"> <img src="imagens/alertas.svg"> ALERTAS </div>
                        <div class="itens"> <img src="imagens/amigos.svg"> AMIGOS </div>
                        <div class="itens"> <img src="imagens/desafios.svg"> DESAFIOS </div>
                        <div class="itens"> <img src="imagens/ranking.svg"> RANKING </div>
                        <div class="itens"> <img src="imagens/regras.svg"> REGRAS </div>
                        <div class="itens"> <img src="imagens/sair.svg"> SAIR </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>