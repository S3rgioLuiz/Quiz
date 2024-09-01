window.onload = function(){
    let visivel = document.querySelector(".visivel");
    let oculto = document.querySelector(".oculto");

    visivel.addEventListener("click", modulosVisiveis);
    oculto.addEventListener("click", modulosOcultos);
}

function modulosVisiveis(event) {
    let visivel = document.querySelector(".visivel");
    let oculto = document.querySelector(".oculto");

    visivel.classList.remove("small");
    oculto.classList.add("small");

    carregarVisiveisConteudo();

}

function modulosOcultos(event) {
    let oculto = document.querySelector(".oculto");
    let visivel = document.querySelector(".visivel");

    oculto.classList.remove("small");
    visivel.classList.add("small");

    carregarOcultosConteudo();
}

document.addEventListener('DOMContentLoaded', function () {
    carregarVisiveisConteudo();
});

function carregarVisiveisConteudo() {
   
    const ajax = new XMLHttpRequest();
    ajax.open('GET', 'visiveis.php');
    ajax.send();
    
    ajax.addEventListener('load', function() {
        if (this.status === 200 && this.readyState === 4) {
            // Seleciona a div onde o conteúdo será carregado
            const usuariosContainer = document.querySelector(".row.modulos");
            if (usuariosContainer) {
                usuariosContainer.innerHTML = this.responseText;
            }
        } else {
            console.error('Erro ao carregar visiveis.php:', this.status);
        }
    });
}

function carregarOcultosConteudo() {
   
    const ajax = new XMLHttpRequest();
    ajax.open('GET', 'ocultos.php');
    ajax.send();
    
    ajax.addEventListener('load', function() {
        if (this.status === 200 && this.readyState === 4) {
            // Seleciona a div onde o conteúdo será carregado
            const usuariosContainer = document.querySelector(".row.modulos");
            if (usuariosContainer) {
                usuariosContainer.innerHTML = this.responseText;
            }
        } else {
            console.error('Erro ao carregar ocultos.php:', this.status);
        }
    });
}








