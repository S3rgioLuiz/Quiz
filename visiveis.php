<?php
    require_once("includes/logica/funcoes.php");
    require_once("includes/logica/conecta.php");
    session_start();
    
   $modulos = selecionarModulosVisiveis($conexao);

   if(!empty($modulos)){
    foreach($modulos as $modulo) {
?>

    <div class="modulov">
        <div class="infos">
            <div class="foto">
                <img src="imagens/<?php echo $modulo['foto']; ?>">
            </div>
            <div class="descricao"> <?php echo $modulo['descricao']; ?> </div>
        </div>
        <div class="botao">
            <form method="post" action="includes/logica/logica.php">        
                <input type="hidden" name="codigo" value="<?php echo $modulo["codigo"]; ?>">
                <button name="modulo" value="editar" class="editar"> EDITAR </button>
            </form>
        </div>
    </div>

<?php } } else { ?>

    <div class="texto"> Não Existem Módulos Visíveis. </div> <?php } ?>