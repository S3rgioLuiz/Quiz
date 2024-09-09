<div class="titulo"> ALTERNATIVAS </div>
<form method="post" action="includes/logica/logica.php">

    <input type="hidden" name="tipo" value="3">

   <input type="text" class="input" name="opcao1" placeholder="ALTERNATIVA CORRETA">
   <input type="text" class="input" name="opcao2" placeholder="ALTERNATIVA INCORRETA">
    
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