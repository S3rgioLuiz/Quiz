function carregaNiveis(event) {
    const modulo = event.target.value;
    if(modulo != 0) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "includes/logica/logica.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.querySelector(".col-10.carrega").innerHTML = xhr.responseText;
            }
        };
        xhr.send("modulo_ajax=" + encodeURIComponent(modulo));
    }
}

function carregaQuestoes(event) {
    const nivel = event.target.value;

    let input = event.target;
    const inputs = document.querySelectorAll('.input');
    inputs.forEach(i => i.classList.remove('selecionado'));
    input.classList.add("selecionado");
     
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/logica/logica.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.querySelector(".row.questoes").innerHTML = xhr.responseText;
        }
    };
    xhr.send("nivel=" + encodeURIComponent(nivel));
}



