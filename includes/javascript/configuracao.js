window.onload = function() {
    let editar = document.querySelector(".editar");
    let submeter = document.querySelector(".submeter");
    let tempo = document.getElementById("tempo");
    let nivel1 = document.getElementById("nivel1");
    let nivel2 = document.getElementById("nivel2");
    let nivel3 = document.getElementById("nivel3");
    let nivel4 = document.getElementById("nivel4");
    let nivel5 = document.getElementById("nivel5");

    editar.addEventListener("click", validaEdicao);
    submeter.addEventListener("click", validaConfiguracao);
    tempo.addEventListener("keypress", apenasNumeros);
    nivel1.addEventListener("keypress", apenasNumeros);
    nivel2.addEventListener("keypress", apenasNumeros);
    nivel3.addEventListener("keypress", apenasNumeros);
    nivel4.addEventListener("keypress", apenasNumeros);
    nivel5.addEventListener("keypress", apenasNumeros);
    
}

function apenasNumeros(event) {
    if(event.keyCode < 48 || event.keyCode > 57) event.preventDefault();
}

function validaEdicao(event) {
    let aviso = document.querySelector(".aviso1");
    let nome = document.querySelector(".nome");
    let arquivo = document.querySelector(".arquivo");
    let descricao = document.querySelector(".descricao");
    let arquivo_label = document.querySelector(".arquivo-labe");
    let extensoes = ['jpg', 'jpeg', 'png', 'svg'];
    let d = 0;

    if (nome.value == "") {
        nome.classList.add("invalid");
        d++;
    } else if (nome.classList.contains("invalid") && nome.value != "") {
        nome.classList.remove("invalid");
    }

    if (descricao.value == "") {
        descricao.classList.add("invalid");
        d++;
    } else if (descricao.classList.contains("invalid") && descricao.value != "") {
        descricao.classList.remove("invalid");
    }

    if (d > 0) {
        event.preventDefault();
        aviso.innerHTML = "Preencha Todos os Campos!";
    } else {
        if (arquivo.files.length > 0) {
            let file = arquivo.files[0];
            let fileName = file.name;
            let extensao = fileName.split('.').pop().toLowerCase();

            if (!extensoes.includes(extensao)) {
                event.preventDefault();
                arquivo_label.classList.add("invalid");
                aviso.innerHTML = "Apenas Arquivos jpg, jpeg, png e svg são Permitidos.";
            }
        }
    }
}

function validaConfiguracao(event) {
    let d = 0;
    let c = 0;
    let aviso = document.querySelector(".aviso2");
    let inputs = document.querySelectorAll(".input");
    
    inputs.forEach((elemento) => {
        if (elemento.value.trim() === "") {
            elemento.classList.add("invalid");
            d++;
            elemento.addEventListener("input", function () {
                elemento.classList.remove("invalid");
            });
        } else if (elemento.classList.contains("invalid")) {
            elemento.classList.remove("invalid");
        }
    });

    if (d > 0) {
        event.preventDefault();
        aviso.innerHTML = "Preencha Todos os Campos";
    } else {
        inputs.forEach((elemento) => {
            if(elemento.value == 0) {
                c++
                elemento.classList.add("invalid");
            } else if(elemento.classList.contains("invalid"))
                elemento.classList.remove("invalid");
        })

        if(c > 0) {
            event.preventDefault();
            aviso.innerHTML = "Digite Apenas Valores Maiores que 0.";
        }
    }
}
