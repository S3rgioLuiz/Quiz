<?php

    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();

    if(!($_SESSION['logado'] && $_SESSION['identificacao'] != "comum"))
        header("Location:index.php");

    $array = array($_SESSION["modulo"]);
    $modulo = selecionarModuloPorCodigo($conexao, $array);
    $configuracao = selecionarConfiguracao($conexao, $array);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/configuracao.css" media="screen"/>
    <script src="includes/javascript/configuracao.js"></script>
  </head>
  <body class="corpo">

        <div class="container-fluid align-items-center">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="menu">

                        <div class="logo"> <a href="home.php"><img src="imagens/logo.png"></a> </div>
                        <div class="itens alertas"> <img src="imagens/alertas.svg"> ALERTAS </div>
                        <div class="itens painel"> <img src="imagens/painel.svg"> PAINEL </div>
                        <a href="questoes.php"> <div class="itens questoes"> <img src="imagens/questoes.svg"> QUESTÕES </div></a>
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
                                <input type="hidden" name="codigo" value="<?php echo $modulo["codigo"]; ?>">
                                <input type="hidden" name="foto" value="<?php echo $modulo["foto"]; ?>">
                                <div class="foto"> <img src="imagens/<?php echo $modulo["foto"]; ?>"> </div>
                                <input type="text" name="nome" class="nome" value="<?php echo $modulo["nome"]; ?>" placeholder="DIGITE O NOME">
                                <label for="arquivo" class="arquivo-label">Trocar Foto</label>
                                <input type="file" name="arquivo" id="arquivo" class="arquivo">
                                <textarea maxlength="255" rows="5" cols="40" 
                                    placeholder="DIGITE A DESCRIÇÃO"
                                    name="descricao" class="descricao"><?php echo $modulo["descricao"]; ?></textarea>
                                <button type="submit" class="editar" name="modulo" value="editar"> EDITAR </button>
                            </form>
                            <div class="aviso1">
                            <?php
                                if(isset($_SESSION['aviso1'])){ 
                                    echo $_SESSION['aviso1'];
                                    unset($_SESSION['aviso1']);
                                }
                            ?>
                            </div>
                        </div>

                        <div class="col-4 offset-1 align-self-center">
                            <div class="titulo"> CONFIGURAÇÃO </div>
                            <form method="post" action="includes/logica/logica.php">

                                <?php if(!empty($configuracao)){ ?>
                                <input type="hidden" name="codigo" value="<?php echo $configuracao["codigo"]; ?>">
                                <?php } ?>

                                <input type="text" name="tempo" class="input" id="tempo"
                                <?php if(!empty($configuracao)) { ?> value="<?php echo $configuracao["tempo"]; ?> "  
                                <?php } ?> placeholder="TEMPO EM SEGUNDOS" >

                                <input type="text" name="nivel1" class="input" id="nivel1"
                                <?php if(!empty($configuracao)) { ?> value="<?php echo $configuracao["nivel_um"]; ?> "  
                                <?php } ?> placeholder="NÍVEL 1" >

                                <input type="text" name="nivel2" class="input" id="nivel2"
                                <?php if(!empty($configuracao)) { ?> value="<?php echo $configuracao["nivel_dois"]; ?> "  
                                <?php } ?> placeholder="NÍVEL 2" >

                                <input type="text" name="nivel3" class="input" id="nivel3"
                                <?php if(!empty($configuracao)) { ?> value="<?php echo $configuracao["nivel_tres"]; ?> "  
                                <?php } ?> placeholder="NÍVEL 3">

                                <input type="text" name="nivel4" class="input" id="nivel4"
                                <?php if(!empty($configuracao)) { ?> value="<?php echo $configuracao["nivel_quatro"]; ?> "  
                                <?php } ?> placeholder="NÍVEL 4">

                                <input type="text" name="nivel5" class="input" id="nivel5"
                                <?php if(!empty($configuracao)) { ?> value="<?php echo $configuracao["nivel_cinco"]; ?> "  
                                <?php } ?> placeholder="NÍVEL 5">

                                <button type="submit" class="submeter" name="configuracao" 
                                value="<?php echo !empty($configuracao) ? "editar" : "adicionar"; ?>">
                                <?php echo !empty($configuracao) ? "EDITAR" : "ADICIONAR"; ?></button>

                            </form>
                            <div class="aviso2">
                            <?php
                                if(isset($_SESSION['aviso2'])){ 
                                    echo $_SESSION['aviso2'];
                                    unset($_SESSION['aviso2']);
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