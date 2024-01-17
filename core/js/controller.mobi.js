document.addEventListener('DOMContentLoaded', function () {

    // Função para carregar scripts de forma assíncrona
    function carregarScript(url, callback) {
        var script = document.createElement('script');
        script.src = url;
        script.onload = callback;
        script.defer = true; // Adicione esta linha
        document.head.appendChild(script);
    }

    // Função para executar scripts dinamicamente
    function executarScripts(src) {
        // Iterar sobre os scripts e adicioná-los ao DOM
        var scriptPath = './ctrl/pages.js' + src;
        var script = document.createElement('script');
        script.src = scriptPath;
        document.head.appendChild(script);
    }

    // Carregar o script do Page.js dinamicamente
    carregarScript('./node_modules/page/page.js', function () {
        // Carregar as rotas do arquivo JSON
        fetch('./core/json/routes.json')
            .then(response => response.json())
            .then(data => {
                // Configurar rotas dinamicamente
                data.routes.forEach(route => {
                    page(route.path, function (ctx) {
                        var pagePath = './ctrl/pages' + route.path;
                        fetch(pagePath)
                            .then(response => {
                                if (response.ok) {
                                    return response.text();
                                } else {
                                    throw new Error('Página não encontrada');
                                }
                            })
                            .then(html => {
                                // Criar um novo elemento div e definir seu conteúdo HTML
                                var newDiv = document.createElement('div');
                                newDiv.innerHTML = html;

                                // Adicionar scripts ao DOM para que sejam executados
                                var scripts = newDiv.getElementsByTagName('script');

                                // Substituir o conteúdo do elemento 'app' com o novo conteúdo
                                document.getElementById('app').innerHTML = newDiv.innerHTML;

                                // Executar os scripts dinamicamente após o carregamento total da página
                                //window.addEventListener('load', function() {
                                executarScripts(route.path);
                                //});
                            })
                            .catch(error => {
                                console.error('Erro ao carregar a página:', error);
                                page('/404');
                            });
                    });
                });

                // Rota genérica para lidar com páginas não encontradas
                page('*', function (ctx) {
                    fetch('./public/error/404.php')
                        .then(response => response.text())
                        .then(html => {
                            // Criar um novo elemento div e definir seu conteúdo HTML
                            var newDiv = document.createElement('div');
                            newDiv.innerHTML = html;

                            // Adicionar scripts ao DOM para que sejam executados
                            var scripts = newDiv.getElementsByTagName('script');

                            // Substituir o conteúdo do elemento 'app' com o novo conteúdo
                            document.getElementById('app').innerHTML = newDiv.innerHTML;

                            // Executar os scripts dinamicamente após o carregamento total da página
                            window.addEventListener('load', function () {
                                executarScripts(scripts);
                            });
                        })
                        .catch(error => console.error('Erro ao carregar a página 404:', error));
                });

                // Iniciar o roteamento
                page();
            })
            .catch(error => console.error('Erro ao carregar as rotas:', error));
    })
});

const mobi = {
        
    post: (url, data, successCallback, errorCallback) => {
        // Simulação de uma requisição POST (substitua por sua lógica real)
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onload = () => {
            if (xhr.status >= 200 && xhr.status < 300) {
                successCallback(xhr.responseText);
            } else {
                errorCallback(`Error: ${xhr.status} - ${xhr.statusText}`);
            }
        };

        xhr.onerror = () => {
            errorCallback('Network error');
        };

        const jsonData = JSON.stringify(data);
        xhr.send(jsonData);
        
    }
};
