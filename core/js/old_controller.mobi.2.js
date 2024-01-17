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
    function executarScripts(scripts) {
        // Iterar sobre os scripts e adicioná-los ao DOM
        for (var i = 0; i < scripts.length; i++) {
            var script = document.createElement('script');
            script.text = scripts[i].text; // Use 'text' em vez de 'innerHTML' para scripts
            document.head.appendChild(script);
        }
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

                                // Executar os scripts dinamicamente
                                executarScripts(scripts);

                                // Substituir o conteúdo do elemento 'app' com o novo conteúdo
                                document.getElementById('app').innerHTML = newDiv.innerHTML;
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

                            // Executar os scripts dinamicamente
                            executarScripts(scripts);

                            // Substituir o conteúdo do elemento 'app' com o novo conteúdo
                            document.getElementById('app').innerHTML = newDiv.innerHTML;
                        })
                        .catch(error => console.error('Erro ao carregar a página 404:', error));
                });

                // Iniciar o roteamento
                page();
            })
            .catch(error => console.error('Erro ao carregar as rotas:', error));
    })
});