window.onload = function() {
    let adicionar = document.querySelector(".editar");
    let nivel = document.querySelector(".nivel");

    adicionar.addEventListener("click", validaEdicao);
    nivel.addEventListener("keypress", validaNivel);
}

function validaNivel(event) {
    if((event.keyCode < 49 || event.keyCode > 53) || (this.value.length >= 1)) event.preventDefault();
}

function validaEdicao(event) {
    let aviso = document.querySelector(".aviso1");
    let arquivo = document.querySelector(".arquivo");
    let arquivo_label = document.querySelector(".arquivo_label");
    let pergunta = document.querySelector(".pergunta");
    let explicacao = document.querySelector(".explicacao");
    let referencia = document.querySelector(".referencia");
    let nivel = document.querySelector(".nivel");
    let extensoes = ['jpg', 'jpeg', 'png', 'svg'];
    let d = 0;

    if (pergunta.value == "") {
        pergunta.classList.add("invalid");
        d++;
    } else if (pergunta.classList.contains("invalid") && pergunta.value != "") 
        pergunta.classList.remove("invalid");

    if (explicacao.value == "") {
        explicacao.classList.add("invalid");
        d++;
    } else if (explicacao.classList.contains("invalid") && explicacao.value != "") 
        explicacao.classList.remove("invalid");
    
    if (referencia.value == "") {
        referencia.classList.add("invalid");
        d++;
    } else if (referencia.classList.contains("invalid") && referencia.value != "") 
        referencia.classList.remove("invalid");

    if (nivel.value == "") {
        nivel.classList.add("invalid");
        d++;
    } else if (nivel.classList.contains("invalid") && nivel.value != "") 
        nivel.classList.remove("invalid");

    if(d > 0){
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