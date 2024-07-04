window.onload = function(){
    let entrar = document.getElementById("entrar");
    let recuperar = document.getElementById("recuperar");

    entrar.addEventListener("click", validaLogin);
    recuperar.addEventListener("click", validaRecuperacao);

}

function validaLogin(event) {
    var texto = document.querySelector(".aviso");
    var itens = document.querySelectorAll(".input");
    var d = 0;

    if(itens[0].value == ""){
        itens[0].classList.add("invalid");
        d++;
    } else if(itens[0].classList.contains("invalid") && itens[0].value != "")
        itens[0].classList.remove("invalid");


    if(itens[1].value == ""){
        itens[1].classList.add("invalid");
        d++;
    } else if(itens[1].classList.contains("invalid") && itens[1].value != "")
        itens[1].classList.remove("invalid");

    if( d > 0) {
        event.preventDefault();
        texto.innerHTML = "Preencha os 2 campos.";    
    }
}

function validaEmail(email) {
    let emailPattern =
      /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    return emailPattern.test(email);
}

function validaRecuperacao(event){
    var texto = document.querySelector(".aviso");
    var usuario = document.getElementById("usuario");
    let senha = document.getElementById("senha");
    let d = 0;

    if(senha.classList.contains("invalid") == true){
        senha.classList.remove("invalid");
    }

    if(usuario.value == ""){
        d++; texto.innerHTML = "Preencha o Email!";
    } else if(!validaEmail(usuario.value)){
        d++; texto.innerHTML = "Email Inválido!";
    }

    if(d > 0){
        event.preventDefault();
        usuario.classList.add("invalid");
    }
}