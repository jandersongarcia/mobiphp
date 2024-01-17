// Função para carregar scripts de forma assíncrona
function carregarScript(url, callback) {
    var script = document.createElement('script');
    script.src = url;
    script.onload = callback;
    document.head.appendChild(script);
}

// Carregar o script do Page.js dinamicamente
carregarScript('./node_modules/page/page.js', function () {
    
});