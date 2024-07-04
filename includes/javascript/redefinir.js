window.onload = function(){
    let senha = document.getElementById("senha");
    let csenha = document.getElementById("csenha");
    let redefinir = document.getElementById("redefinir");

    senha.addEventListener("keypress", validaSenha);
    csenha.addEventListener("keypress", validaSenha);
    redefinir.addEventListener("click", validaRedefinicao);
}

function validaSenha(event){
    var texto = document.querySelector(".aviso");
    if(this.value.length < 8) texto.innerHTML = "A Senha deve ter no Mínimo 8 Caracteres";
    else if(this.value.length == 20){
        event.preventDefault();
        texto.innerHTML = "A Senha pode ter no Máximo 20 Caracteres";
    } else texto.innerHTML = "";
}

function validaRedefinicao(event){
    var texto = document.querySelector(".aviso");
    let senha = document.querySelector("#senha");
    let csenha = document.querySelector("#csenha");
    let d = 0;

    if(senha.value == "" || csenha.value == ""){
        texto.innerHTML = "Preencha os 2 Campos!";
        d++;
    } else if(senha.value != csenha.value){
        texto.innerHTML = "Senha e Confirmação de Senha devem ser Iguais.";
        d++;
    } else if(senha.value.length < 8){
        texto.innerHTML = "A Senha deve Possuir no Minino 8 Caracteres.";
        d++;
    }

    if(d > 0){
        event.preventDefault();
        senha.classList.add("invalid");
        csenha.classList.add("invalid");
    }
}