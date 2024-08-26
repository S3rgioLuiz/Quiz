window.onload = function(){
    let apelido = document.getElementById("input");
    let adicionar = document.getElementById("adicionar");
    let amigos = document.querySelector(".lamigos");
    let pendentes = document.querySelector(".lpendentes");

    apelido.addEventListener("keypress", validaApelido);
    adicionar.addEventListener("click", validaPedido);
    amigos.addEventListener("click", listaAmigos);
    pendentes.addEventListener("click", convitesPendentes);

}

function validaApelido(event){
    if((event.keyCode >= 48 && event.keyCode <= 57) || 
    (event.keyCode >= 65 && event.keyCode <= 90) ||
    (event.keyCode >= 97 && event.keyCode <= 122)){
        if(this.value.length == 0 && (event.keyCode >= 48 && event.keyCode <= 57)){
            event.preventDefault();
        }
        else if(this.value.length == 15){
            event.preventDefault();
        }
    } else {
        event.preventDefault();
    }  
}

function validaPedido(event) {
    let apelido = document.querySelector(".input");
    let aviso = document.querySelector("#aviso");

    if(apelido.value == ""){
        event.preventDefault();
        apelido.style.border = "red 2px solid";
        aviso.innerHTML = "Preencha o Campo Apelido!";
    }
    else if(apelido.value.length < 4){
        event.preventDefault();
        apelido.style.border = "red 2px solid";
        aviso.innerHTML = "Apelido Inválido!";
    }
}


function listaAmigos(event) {
    let amigos = document.querySelector(".lamigos");
    let pendentes = document.querySelector(".lpendentes");

    amigos.classList.remove("small");
    pendentes.classList.add("small");
}


function convitesPendentes(event) {
    let pendentes = document.querySelector(".lpendentes");
    let amigos = document.querySelector(".lamigos");

    pendentes.classList.remove("small");
    amigos.classList.add("small");
}




