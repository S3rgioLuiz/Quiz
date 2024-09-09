<?php 
     if($_SESSION["modulo"] == 1) {
        $questoes = selecionarQuestoesSemModulo($conexao);
    } else {
        $array = array(number_format($_SESSION["modulo"]), number_format($_SESSION["nivel"]));
        $questoes = selecionarQuestoesPorNivel($conexao, $array);
    }

    if(!empty($questoes)) { 
        
        foreach($questoes as $questao) { ?>

        <div class="col-4 infos">

            <div class="<?php echo $questao["status"] == 0 ? "oculto" : "visivel"; ?>">

            <?php if($questao["foto"] == "Sem Foto") { ?>
                
                <div class="pergunta1"> <?php echo $questao["pergunta"]; ?> </div>

            <?php } else { ?>

                <div class="foto"> <img src="imagens/<?php echo $questao["foto"]; ?>"> </div>
                <div class="pergunta2"> <?php echo $questao["pergunta"]; ?> </div>

            <?php } ?>

            </div>

            <form method="post" action="includes/logica/logica.php">
                <input type="hidden" name="codigo" value="<?php echo  $questao["codigo"]; ?>">
                <button type="submit" name="acessar" value="questao"> EDITAR </button>
            </form>
        </div>

<?php } 
    } else { ?>

        <div class="col-12">
            <div class="texto"> NÃO HÁ QUESTÕES. </div>
        </div>

<?php } ?>


