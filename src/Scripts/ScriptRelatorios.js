function gerarRelatorio(formato) {

    var url = 'C:\Users\eveff\JaspersoftWorkspace\relatorio_de_funcionarios\relatorio_de_funcionarios.jasper' + formato;
    
    // Realizar uma chamada Ajax para o servidor JasperReports
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'blob';

    xhr.onload = function () {
        if (xhr.status === 200) {
            var blob = xhr.response;
            var extensao = formato === 'pdf' ? 'pdf' : 'xlsx'; 
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'relatorio.' + extensao;
            link.click();
        }
    };

    xhr.send();
}
