
fetch("/projetos/3LM_TablePHP/src/PHP/OfficeTB.php")

    .then(response => response.text())
    .then(data => {
        document.getElementById("TabelaOffice").innerHTML = data;
    })

    .catch(error => {
        console.error("Erro ao carregar tabela -", error)
    });