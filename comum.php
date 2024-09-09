<div class="titulo"> ALTERNATIVAS </div>
<form method="post" action="includes/logica/logica.php">

    <input type="hidden" name="tipo" value="1">

    <textarea axlength="255" rows="5" cols="40" 
    name="opcao1" class="textarea" placeholder="ALTERNATIVA CORRETA"></textarea>

    <textarea axlength="255" rows="5" cols="40" 
    name="opcao2" class="textarea" placeholder="ALTERNATIVA INCORRETA"></textarea>

    <textarea axlength="255" rows="5" cols="40" 
    name="opcao3" class="textarea" placeholder="ALTERNATIVA INCORRETA"></textarea>

    <textarea axlength="255" rows="5" cols="40" 
    name="opcao4" class="textarea" placeholder="ALTERNATIVA INCORRETA"></textarea>
    
    <button name="alternativa" value="adicionar" class="adicionar"> ADICIONAR </button>
</form>

<div class="aviso2">
    <?php
    if(isset($_SESSION['aviso2'])){ 
        echo $_SESSION['aviso2'];
        unset($_SESSION['aviso2']);
    }
    ?>
</div>