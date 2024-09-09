<div class="titulo"> ALTERNATIVAS </div>
<form form method="post" action="includes/logica/logica.php" enctype="multipart/form-data">
    <input type="hidden" name="tipo" value="2">

    <label for="arquivo1" class="arquivo1_label">Alternativa Correta</label>
    <input type="file" name="arquivo1" id="arquivo1" class="arquivo1">

    <label for="arquivo2" class="arquivo2_label">Alternativa Incorreta</label>
    <input type="file" name="arquivo2" id="arquivo2" class="arquivo2">

    <label for="arquivo3" class="arquivo3_label">Alternativa Incorreta</label>
    <input type="file" name="arquivo3" id="arquivo3" class="arquivo3">

    <label for="arquivo4" class="arquivo4_label">Alternativa Incorreta</label>
    <input type="file" name="arquivo4" id="arquivo4" class="arquivo4">

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