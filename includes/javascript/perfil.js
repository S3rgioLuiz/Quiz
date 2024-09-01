window.onload = function() {
    let dados = document.getElementById("dados");
    let senha = document.getElementById("senha");
    let nsenha = document.getElementById("nsenha");
    let csenha = document.getElementById("csenha");

    //dados.addEventListener("click", alterarNome);
    //senha.addEventListener("click", alterarSenha);
    nsenha.addEventListener("keypress", validaSenha);
    csenha.addEventListener("keypress", validaSenha);
}

function validaSenha(event){
    console.log("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
    var texto = document.querySelector(".aviso");
    if(this.value.length < 8) texto.innerHTML = "A Senha deve ter no Mínimo 8 Caracteres";
    else if(this.value.length == 20){
        event.preventDefault();
        texto.innerHTML = "A Senha pode ter no Máximo 20 Caracteres";
    } else texto.innerHTML = "";
}

