function inserirCargo(){
    const select = document.getElementById("cargo");

    //solicitação de busca
    fetch("/Projetos/3LM_TablePHP/src/PHP/OpcoesSelect.php")
        .then(response => response.json())
        .then(data => {
            while (select.options.length > 0) {
                select.remove(1);
            }
            
            data.forEach(opcao => {
                const option = document.createElement("option");
                option.value = opcao.id;
                option.value = opcao.cargo;
                option.text = opcao.cargo;
                select.appendChild(option);
                
            });
        })
        
        .catch(erro => {
            console.error("Erro ao buscar opções do cargo:", erro);
        });
}
window.addEventListener("load", inserirCargo);