<?php

    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();

    if(!$_SESSION['logado'])
        header("Location:index.php");

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/modulos.css" media="screen"/>
    <script src="includes/javascript/modulos.js"></script>
  </head>
  <body class="corpo">

        <div class="container-fluid align-items-center">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="menu">

                    <?php
                        if($_SESSION["identificacao"] == "admin") {
                    ?>
                        <div class="logo"> <a href="home.php"><img src="imagens/logo.png"></a> </div>
                        <div class="itens alertas"> <img src="imagens/alertas.svg"> ALERTAS </div>
                        <div class="itens painel"> <img src="imagens/painel.svg"> PAINEL </div>
                        <a href="questoes.php"><div class="itens questoes"> <img src="imagens/questoes.svg"> QUESTÕES </div></a>
                        <div class="itens regras"> <img src="imagens/regras.svg"> REGRAS </div>
                        <div class="itens amigos"> <img src="imagens/amigos.svg"> USUÁRIOS </div>
                        <form id="sair" action="includes/logica/logica.php" method="post">
                            <input type="hidden" name="sair" value="true">
                            <div class="itens sair" onclick="document.getElementById('sair').submit();"> 
                                <img src="imagens/sair.svg"> SAIR 
                            </div>
                        </form>
                    <?php
                        } else {
                    ?>
                        <div class="logo"> <a href="home.php"><img src="imagens/logo.png"></a> </div>
                        <div class="itens alertas"> <img src="imagens/alertas.svg"> ALERTAS </div>
                        <a href="amizade.php"><div class="itens amigos"> <img src="imagens/amigos.svg"> AMIGOS </div></a>
                        <div class="itens desafios"> <img src="imagens/desafios.svg"> DESAFIOS </div>
                        <div class="itens ranking"> <img src="imagens/ranking.svg"> RANKING </div>
                        <div class="itens regras"> <img src="imagens/regras.svg"> REGRAS </div>
                        <form id="sair" action="includes/logica/logica.php" method="post">
                            <input type="hidden" name="sair" value="true">
                            <div class="itens sair" onclick="document.getElementById('sair').submit();"> 
                                <img src="imagens/sair.svg"> SAIR 
                            </div>
                        </form>
                    <?php } ?>  
                    </div>
                </div>
                <div class="col-10 sessao">

                    <div class="row justify-content-center adicionar">
                        <div class="col-7">
                            <div id="aviso">
                                <?php
                                if(isset($_SESSION['aviso'])){ 
                                    echo $_SESSION['aviso'];
                                    unset($_SESSION['aviso']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="modulo.php"> <button class="botao"> ADICIONAR </button></a>
                        </div>
                    </div>

                    <div class="row justify-content-center lista">
                        <div class="col-10">
                            <div class="visivel">
                                <span> MÓDULOS VISÍVEIS </span>
                            </div>
                            <div class="oculto small">
                                <span> MÓDULOS OCULTOS </span>
                            </div>
                        </div>
                    </div>

                    <div class="row modulos">

                    </div>

                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>