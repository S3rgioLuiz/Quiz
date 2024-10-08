<?php

    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();

    if(!($_SESSION['logado'] && $_SESSION['identificacao'] != "comum"))
        header("Location:index.php");

    $modulos = selecionarModulos($conexao);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Questões</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/questoes.css" media="screen"/>
  </head>
  <body class="corpo">

        <div class="container-fluid align-items-center">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="menu">

                        <div class="logo"> <a href="home.php"><img src="imagens/logo.png"></a> </div>
                        <div class="itens alertas"> <img src="imagens/alertas.svg"> ALERTAS </div>
                        <div class="itens painel"> <img src="imagens/painel.svg"> PAINEL </div>
                        <div class="itens questoes"> <img src="imagens/questoes-b.svg"> QUESTÕES </div>
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
                <div class="col-10 sessao">
                    
                    <div class="row justify-content-center modulos">
                        <div class="col-3 offset-7">

                            <form method="post" action="includes/logica/logica.php" id="formulario">
                                <select name="modulo_ajax" onchange="carregaNiveis(event)" class="select">
                                    <option value="0"> ESCOLHA </option>
                                <?php 
                                    foreach($modulos as $modulo) { ?>
                                    <option value="<?php echo $modulo["codigo"] ?>"> 
                                        <?php echo $modulo["nome"]; ?> 
                                    </option>
                                <?php } ?>
                                </select>
                            </form>

                        </div>
                    </div>

                    <div class="row justify-content-center">
                       <div class="col-10 carrega">

                       </div>
                    </div>


                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="includes/javascript/questoes.js"></script>
</body>
</html>