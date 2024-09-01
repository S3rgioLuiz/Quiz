window.onload = function() {
    let adicionar = document.querySelector(".adicionar");
    let editar = document.querySelector(".editar");

    if (adicionar) {
        adicionar.addEventListener("click", verificaCriacao);
    }

    if (editar) {
        editar.addEventListener("click", verificaEdicao);
    }
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

function verificaEdicao(event) {
    console.log("Função verificaEdicao chamada");

    let aviso = document.querySelector(".aviso");
    let nome2 = document.querySelector(".nome2");
    let descricao2 = document.querySelector(".descricao2");
    let arquivo2 = document.querySelector(".arquivo2");
    let arquivo_label = document.querySelector(".arquivo-label");
    let extensoes = ['jpg', 'jpeg', 'png', 'svg'];
    let d = 0;

    // Verificar se o campo 'nome' está vazio
    if (nome2.value == "") {
        nome2.classList.add("invalid");
        d++;
    } else if (nome2.classList.contains("invalid") && nome2.value != "") {
        nome2.classList.remove("invalid");
    }

    // Verificar se o campo 'descricao' está vazio
    if (descricao2.value == "") {
        descricao2.classList.add("invalid");
        d++;
    } else if (descricao2.classList.contains("invalid") && descricao2.value != "") {
        descricao2.classList.remove("invalid");
    }

    // Se algum campo obrigatório estiver vazio, mostrar aviso e impedir o envio
    if (d > 0) {
        event.preventDefault();
        aviso.innerHTML = "Preencha Todos os Campos!";
    } else {
        // Se um arquivo foi selecionado, verificar a extensão
        if (arquivo2.files.length > 0) {
            let file = arquivo2.files[0];
            let fileName = file.name;
            let extensao = fileName.split('.').pop().toLowerCase();

            // Verifica se a extensão do arquivo não é permitida
            if (!extensoes.includes(extensao)) {
                event.preventDefault();
                arquivo_label.classList.add("invalid");
                aviso.innerHTML = "Apenas Arquivos jpg, jpeg, png e svg são Permitidos.";
            } else {
                arquivo_label.classList.remove("invalid");
            }
        }
    }
}
