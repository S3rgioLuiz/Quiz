<?php

    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();

    if(!($_SESSION['logado'] && $_SESSION['identificacao'] != "admin"))
        header("Location:index.php");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amigos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/amizade.css" media="screen"/>
    <script src="includes/javascript/amizade.js"></script>
  </head>
  <body class="corpo">

        <div class="container-fluid align-items-center">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="menu">
                        <div class="logo"> <a href="home.php"><img src="imagens/logo.png"></a> </div>
                        <div class="itens alertas"> <img src="imagens/alertas.svg"> ALERTAS </div>
                        <div class="itens amigos"> <img src="imagens/amigos-b.svg"> AMIGOS </div>
                        <div class="itens desafios"> <img src="imagens/desafios.svg"> DESAFIOS </div>
                        <div class="itens ranking"> <img src="imagens/ranking.svg"> RANKING </div>
                        <div class="itens regras"> <img src="imagens/regras.svg"> REGRAS </div>
                        <form id="sair" action="includes/logica/logica.php" method="post">
                            <input type="hidden" name="sair" value="true">
                            <div class="itens sair" onclick="document.getElementById('sair').submit();"> 
                                <img src="imagens/sair.svg"> SAIR 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-10">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="row justify-content-center adicionar">
                                <div class="col-5 align-self-center">
                                    <p id="aviso">
                                    <?php
                                        if(isset($_SESSION['aviso'])){ 
                                            echo $_SESSION['aviso'];
                                            unset($_SESSION['aviso']);
                                        }
                                    ?>
                                    </p>
                                </div>
                                <div class="col-7 align-self-center">
                                    <form method="post" action="includes/logica/logica.php">
                                        <input type="text" id="input" class="input" name="apelido" placeholder="DIGITE O APELIDO">
                                        <button type="submit" name="adicionar" id="adicionar"><img src="imagens/adicionar.svg"></button>
                                    </form>
                                </div>
                            </div>
                            <div class="row justify-content-center lista">
                                <div class="col-12">
                                    <div class="lamigos">
                                        <span> LISTA DE AMIGOS </span>
                                    </div>
                                    <div class="lpendentes small">
                                        <span> CONVITES DE AMIZADE </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row usuarios">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>