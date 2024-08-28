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

    carregarAmigosConteudo();


}

document.addEventListener('DOMContentLoaded', function () {
    carregarAmigosConteudo();
});


function convitesPendentes(event) {
    let pendentes = document.querySelector(".lpendentes");
    let amigos = document.querySelector(".lamigos");

    pendentes.classList.remove("small");
    amigos.classList.add("small");

    carregarPendentesConteudo()
}

function carregarAmigosConteudo() {
   
    const ajax = new XMLHttpRequest();
    ajax.open('GET', 'amigos.php');
    ajax.send();
    
    ajax.addEventListener('load', function() {
        if (this.status === 200 && this.readyState === 4) {
            // Seleciona a div onde o conteúdo será carregado
            const usuariosContainer = document.querySelector(".row.usuarios");
            if (usuariosContainer) {
                usuariosContainer.innerHTML = this.responseText;
            }
        } else {
            console.error('Erro ao carregar amigos.php:', this.status);
        }
    });
}

function carregarPendentesConteudo() {
   
    const ajax = new XMLHttpRequest();
    ajax.open('GET', 'pendentes.php');
    ajax.send();
    
    ajax.addEventListener('load', function() {
        if (this.status === 200 && this.readyState === 4) {
            // Seleciona a div onde o conteúdo será carregado
            const usuariosContainer = document.querySelector(".row.usuarios");
            if (usuariosContainer) {
                usuariosContainer.innerHTML = this.responseText;
            }
        } else {
            console.error('Erro ao carregar amigos.php:', this.status);
        }
    });
}




