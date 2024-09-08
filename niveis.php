<div class="row adicionar">
    <div class="col-3 offset-9">
        <a href="questao.php"> <button class="botao"> ADICIONAR </button></a>
    </div>
</div>

<div class="row justify-content-center niveis">
    <div class="col-2 nivel1">
        <form method="post" action="includes/logica/logica.php">
            <input type="text" name="nivel" class="input" value="1"
             onclick="carregaQuestoes(event)" readonly>
        </form>
    </div>
    <div class="col-2 nivel2">
        <form method="post" action="includes/logica/logica.php">
            <input type="text" name="nivel" class="input" value="2"
             onclick="carregaQuestoes(event)" readonly>
        </form>
    </div>
    <div class="col-2 nivel3">
        <form method="post" action="includes/logica/logica.php">
            <input type="text" name="nivel" class="input" value="3"
             onclick="carregaQuestoes(event)" readonly>
        </form>
    </div>
    <div class="col-2 nivel4">
        <form method="post" action="includes/logica/logica.php">
            <input type="text" name="nivel" class="input" value="4"
             onclick="carregaQuestoes(event)" readonly>
        </form>
    </div>
    <div class="col-2 nivel5">
        <form method="post" action="includes/logica/logica.php">
            <input type="text" name="nivel" class="input" value="5"
             onclick="carregaQuestoes(event)" readonly>
        </form>
    </div>
</div>

<div class="row questoes">

</div>