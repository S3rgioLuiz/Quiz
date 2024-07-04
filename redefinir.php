<?php

    session_start();

    if(!$_SESSION['recuperar']){
        header("Location:index.php");
    }

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redefinir Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="includes/javascript/redefinir.js"></script>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="includes/css/redefinir.css" media="screen"/>
  </head>
  <body class="corpo">

    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-8 text-center align-self-center">
                <img src="imagens/figura.svg">
            </div>
            <div class="col-4 text-center align-self-center formulario">
                <div class="formulario">
                    <form method="post" action="includes/logica/logica.php">
                        <input type="password" class="input" name="senha" id="senha" placeholder="Digite a Senha"/>
                        <input type="password" class="input" name="csenha" id="csenha" placeholder="Confirme a Senha"/>
                        <button type="submit" class="redefinir" name="redefinir" id="redefinir"> REDEFINIR </button>
                    </form>
                </div>
                <div class="aviso">
                    <?php
                        if(isset($_SESSION['aviso'])){ 
                            echo $_SESSION['aviso'];
                            unset($_SESSION['aviso']);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>