
fetch("/projetos/3LM_TablePHP/src/PHP/EmployeeTB.php")

    .then(response => response.text())
    .then(data => {
        document.getElementById("TabelaEmployee").innerHTML = data;
    })

    .catch(error => {
        console.error("Erro ao carregar tabela -", error)
    });