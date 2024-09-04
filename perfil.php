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
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/perfil.css" media="screen"/>
    <script src="includes/javascript/perfil.js"></script>
  </head>
  <body class="corpo">

        <div class="container-fluid align-items-center">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="menu">

                    <?php
                        if($usuario['status'] == 2) {
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
                    
                    <div class="row">
                        <div class="col-10 informacoes">

                            <form method="post" action="includes/logica/logica.php" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $usuario['codigo']; ?>">
                                <div class="row pessoais">
                                    <div class="col-12 titulo">
                                        <p> DADOS PESSOAIS </P>
                                    </div>
                                    <div class="col-4 foto">
                                        <div>
                                            <img src="imagens/<?php echo $usuario["foto"]; ?>">
                                            <label for="arquivo" class="arquivo-label">Trocar Foto</label>
                                            <input type="file" name="arquivo" id="arquivo" class="arquivo">
                                        </div>
                                    </div>
                                    <div class="col-5 dados">
                                        <div>
                                            <div class="apelido"> <?php echo $usuario['apelido']; ?> </div>
                                            <input type="text" name="nome" class="nome" value="<?php echo $usuario['nome']; ?>">
                                            <div class="email"> <?php echo $usuario['email']; ?> </div>
                                        </div>
                                    </div>
                                    <div class="col-3 salvar">
                                        <button type="submit" name="apelido" id="dados" class="alterar"> SALVAR </button>
                                    </div>
                                </div>
                            </form>
                            
                            <form method="post" action="includes/logica/logica.php">
                                <input type="hidden" value="<?php echo $usuario['codigo']; ?>">
                                <div class="row trocar">
                                    <div class="col-12 titulo">
                                        <p> TROCAR SENHA </P>
                                    </div>
                                    <div class="col-3 asenha">
                                        <input type="text" class="input" name="asenha" placeholder="Senha Antiga">
                                    </div>
                                    <div class="col-3 senha">
                                        <input type="text" class="input" id="nsenha" name="senha" placeholder="Nova Senha">
                                    </div>
                                    <div class="col-3 csenha">
                                        <input type="text" class="input" id="csenha" placeholder="Confirmar Senha">
                                    </div>
                                    <div class="col-3 salvar">
                                        <button type="submit" name="senha" id="senha" class="alterar"> SALVAR </button>
                                    </div>
                                </div>
                            </form>

                            <div class="row conquistas">
                                <div class="col-12 titulo">
                                    <p> CONQUISTAS </P>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>