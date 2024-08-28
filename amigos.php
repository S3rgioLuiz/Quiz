<?php
require_once("includes/logica/funcoes.php");
require_once("includes/logica/conecta.php");
session_start();

$array = array($_SESSION['codigo'], $_SESSION['codigo']); 
$amigos = selecionarAmigos($conexao, $array); ?>

<div class="col-9 amigo">
    <?php if(!empty($amigos)) { 
        foreach($amigos as $amigo ) { ?>
            <div class="row justify-content-center linha">
                <div class="col-4">
                    <div class="apelido"> <?php echo $amigo['apelido']; ?> </div>
                </div>
                <div class="col-4">
                    <form method="post" action="includes/logica/logica.php">
                        <input type="hidden" name="codigo" value="<?php echo $amigo['codigo']; ?>">
                        <button type="submit" name="desafiar" class="desafiar"> DESAFIAR </button>
                    </form>
                </div>
                <div class="col-4">
                    <form method="post" action="includes/logica/logica.php">
                        <input type="hidden" name="codigo" value="<?php echo $amigo['codigo']; ?>">
                        <input type="hidden" name="apelido" value="<?php echo $amigo['apelido']; ?>">
                        <button type="submit" name="excluir" class="excluir"> EXCLUIR </button>
                    </form>
                </div>
            </div>
    <?php } 
    } else { ?>
        <p> Não Possui Amigos. </p>
    <?php } ?>
</div>
