window.onload = function(){
    let apelido = document.getElementById("apelido");
    let senha = document.getElementById("senha");
    let csenha = document.getElementById("csenha");
    let cadastrar = document.getElementById("cadastrar");

    apelido.addEventListener("keypress", validaApelido);
    senha.addEventListener("keypress", validaSenha);
    csenha.addEventListener("keypress", validaSenha);
    cadastrar.addEventListener("click", validaCadastro);

}

function validaApelido(event){
    var texto = document.querySelector(".aviso");
    if((event.keyCode >= 48 && event.keyCode <= 57) || 
    (event.keyCode >= 65 && event.keyCode <= 90) ||
    (event.keyCode >= 97 && event.keyCode <= 122)){
        if(this.value.length == 0 && (event.keyCode >= 48 && event.keyCode <= 57)){
            event.preventDefault();
            texto.innerHTML = "O Primeiro Caractere Deve ser uma Letra (A-Z , a-z).";
        }
        else if(this.value.length >= 0 && this.value.length < 4){
            texto.innerHTML = "Apelido deve ter no Mínimo 4 Caracteres.";
        }
        else if(this.value.length == 15){
            event.preventDefault();
            texto.innerHTML = "Apelido pode ter no Máximo 15 Caracteres.";
        } else {
            texto.innerHTML = "";
        } 
    } else {
        event.preventDefault();
        texto.innerHTML = "Apenas Letras (A-Z , a-z) e Números (0-9).";
    }  
}

function validaSenha(event){
    var texto = document.querySelector(".aviso");
    if(this.value.length < 8) texto.innerHTML = "A Senha deve ter no Mínimo 8 Caracteres";
    else if(this.value.length == 20){
        event.preventDefault();
        texto.innerHTML = "A Senha pode ter no Máximo 20 Caracteres";
    } else texto.innerHTML = "";
}

function validaEmail(email) {
    let emailPattern =
      /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    return emailPattern.test(email);
}

function validaCadastro(event){
    let d = 0;
    var texto = document.querySelector(".aviso");
    var itens = document.querySelectorAll(".input");
    var campos = [
        " Email",
        " Apelido",
        " Nome",
        " Senha",
        " Confirmação de Senha",
    ];
    var nomes = [];
    itens.forEach((elemento, indice) => {
        if (elemento.value == "") {
          elemento.classList.add("invalid");
          d++;
          nomes.push(campos[indice]);
          elemento.addEventListener("change", function () {
            elemento.classList.remove("invalid");
          });
        } else if (
          elemento.classList.contains("invalid") == true &&
          elemento.value != ""
        )
          elemento.classList.remove("invalid");
    });


    if (nomes.length == 1){
        texto.innerHTML = "Campo Obrigatório:" + nomes + ".";
        d++;
    }
    else if (nomes.length >= 2){
        texto.innerHTML = "Campos Obrigatórios:" + nomes + ".";
        d++;
    }
    else if (validaEmail(itens[0].value) == false) {
        d++
        itens[0].classList.add("invalid");
        texto.innerHTML = "Email Inválido";
    }
    else if (itens[1].value.length < 4) {
        itens[0].classList.add("invalid");
        texto.innerHTML = "Apelido deve ter no mínimo 4 Caracteres.";
        d++
    }
    else if (itens[3].value != itens[4].value) {
        d++
        itens[3].classList.add("invalid");
        itens[4].classList.add("invalid");
        texto.innerHTML = "Senha e Confirmação de Senha devem ser Iguais.";
    } else if (itens[3].value.length < 8 && itens[4].value.length < 8) {
        d++
        itens[3].classList.add("invalid");
        itens[4].classList.add("invalid");
        texto.innerHTML = "A Senha deve Possuir no Minino 8 Caracteres.";
    }
    if(d > 0) event.preventDefault();
 
}