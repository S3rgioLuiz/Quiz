window.onload = function() {
    let adicionar = document.querySelector(".adicionar");
   
    adicionar.addEventListener("click", verificaCriacao);
}

function verificaCriacao(event) {
    let aviso = document.querySelector(".aviso");
    let nome1 = document.querySelector(".nome1");
    let descricao1 = document.querySelector(".descricao1");
    let arquivo1 = document.querySelector(".arquivo1");
    let arquivo_label = document.querySelector(".arquivo-label");
    let extensoes = ['jpg', 'jpeg', 'png', 'svg'];
    let d = 0;

    if (nome1.value == "") {
        nome1.classList.add("invalid");
        d++;
    } else if (nome1.classList.contains("invalid") && nome1.value != "") {
        nome1.classList.remove("invalid");
    }

    if (descricao1.value == "") {
        descricao1.classList.add("invalid");
        d++;
    } else if (descricao1.classList.contains("invalid") && descricao1.value != "") {
        descricao1.classList.remove("invalid");
    }

    if (arquivo1.value == "") {
        arquivo_label.classList.add("invalid");
        d++;
    } else if (arquivo_label.classList.contains("invalid") && arquivo1.value != "") {
        arquivo_label.classList.remove("invalid");
    }

    if (d > 0) {
        event.preventDefault();
        aviso.innerHTML = "Preencha Todos os Campos!";
    } else {
        if (arquivo1.files.length > 0) {
            let file = arquivo1.files[0];
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

