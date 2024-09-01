<?php
    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();
    
   $modulos = selecionarModulosOcultos($conexao);

   if(!empty($modulos)){
    foreach($modulos as $modulo) {
?>

    <div class="moduloo">
        <div class="infos">
            <div class="foto">
                <img src="imagens/<?php echo $modulo['foto']; ?>">
            </div>
            <div class="descricao"> <?php echo $modulo['descricao']; ?> </div>
        </div>
        <div class="botao">
            <form method="post" action="includes/logica/logica.php">        
                <input type="hidden" name="codigo" value="<?php echo $modulo["codigo"]; ?>">
                <button type="submit" name="acessar" value="modulo" class="editar"> EDITAR </button>
            </form>
        </div>
    </div>

<?php } } else { ?>

    <div class="texto"> Não Existem Módulos Ocultos. </div> <?php } ?>