document.addEventListener('DOMContentLoaded', function () {

    let nameId;

    // Função para carregar scripts de forma assíncrona
    function carregarScript(url, callback) {
        var script = document.createElement('script');
        script.src = url;
        script.onload = callback;
        script.defer = true;
        document.head.appendChild(script);
    }

    // Função para executar scripts dinamicamente
    function executarScripts(src, name) {
        var scriptPath = './ctrl/pages.js' + src;
        let id = `el${nameId}`;
        // Supondo que você tenha um script com um ID específico
        var scriptParaRemover = document.getElementById(id);

        // Verifica se o script existe antes de tentar removê-lo
        if (scriptParaRemover) {
            scriptParaRemover.parentNode.removeChild(scriptParaRemover);
        }

        var script = document.createElement('script');
        script.src = scriptPath;
        script.id = `el${name}`;
        document.head.appendChild(script);
        nameId = `el${name}`;

        console.log(`el${name}`);

    }

    // Carregar o script do Navigo dinamicamente
    carregarScript('./node_modules/navigo/lib/navigo.js', function () {
        let caminho = './core/json/routes.json?t=' + new Date().getTime();

        // Carregar as rotas do arquivo JSON
        fetch(caminho)
            .then(response => response.json())
            .then(data => {
                // Configurar rotas dinamicamente
                var router = new Navigo('/');

                data.routes.forEach(route => {
                    router.on(route.path, function (params, query) {
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
                                var newDiv = document.createElement('div');
                                newDiv.innerHTML = html;
                                document.getElementById('app').innerHTML = newDiv.innerHTML;

                                // Executar os scripts dinamicamente após o carregamento total da página
                                executarScripts(route.path, route.controller);
                            })
                            .catch(error => {
                                console.error('Erro ao carregar a página:', error);
                                page('/404');
                            });
                    });
                });

                // Rota genérica para lidar com páginas não encontradas
                router.notFound(function () {
                    fetch('./public/error/404.php')
                        .then(response => response.text())
                        .then(html => {
                            var newDiv = document.createElement('div');
                            newDiv.innerHTML = html;

                            var appElement = document.getElementById('app');
                            appElement.innerHTML = newDiv.innerHTML;

                            // Executar os scripts dinamicamente após o carregamento total da página
                            executarScripts('/404', 404);
                        })
                        .catch(error => console.error('Erro ao carregar a página 404:', error));
                });

                // Adicionar um ouvinte de evento para links
                document.body.addEventListener('click', function (event) {
                    var target = event.target;

                    // Verificar se o clique foi em um link
                    if (target.tagName === 'A' && target.getAttribute('href')) {
                        // Impedir o comportamento padrão do link
                        event.preventDefault();

                        // Navegar para a rota especificada no atributo 'href' do link
                        router.navigate(target.getAttribute('href'));
                    }
                });

                // Iniciar o roteamento
                router.resolve();
            })
            .catch(error => console.error('Erro ao carregar as rotas:', error));
    });
});
