<?php

    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();

    if(!($_SESSION['logado'] && $_SESSION['identificacao'] != "comum"))
        header("Location:index.php");

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Módulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/modulo.css" media="screen"/>
    <script src="includes/javascript/modulo.js"></script>
  </head>
  <body class="corpo">

        <div class="container-fluid align-items-center">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="menu">

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
                    
                    </div>
                </div>
                <div class="col-10 align-self-center sessao">
                    
                    <div class="row justify-content-center modulo">
                        <div class="col-6 align-self-center">
                            <div class="titulo"> MÓDULO </div>
                            <form method="post" action="includes/logica/logica.php" enctype="multipart/form-data">
                                <input type="text" name="nome" class="nome1" placeholder="DIGITE O NOME">
                                <label for="arquivo1" class="arquivo-label">Escolher Foto</label>
                                <input type="file" name="arquivo" id="arquivo1" class="arquivo1">
                                <textarea maxlength="255" rows="5" cols="40" 
                                    placeholder="DIGITE A DESCRIÇÃO"
                                    name="descricao" class="descricao1"></textarea>
                                <button type="submit" class="adicionar" name="modulo" value="adicionar"> ADICIONAR </button>
                            </form>
                            <div class="aviso">
                            <?php
                                if(isset($_SESSION['aviso1'])){ 
                                    echo $_SESSION['aviso1'];
                                    unset($_SESSION['aviso1']);
                                }
                            ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>