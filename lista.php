<?php 
     if($_SESSION["modulo"] == 1) {
        $questoes = selecionarQuestoesSemModulo($conexao);
    } else {
        $array = array(number_format($_SESSION["modulo"]), number_format($_SESSION["nivel"]));
        $questoes = selecionarQuestoesPorNivel($conexao, $array);
    }

    if(!empty($questoes)){
        var_dump($questoes); die;
?>

<?php
    } else {
?>

        <div class="col-12">
            <div class="texto"> NÃO HÁ QUESTÕES. </div>
        </div>

<?php
    }
?>


