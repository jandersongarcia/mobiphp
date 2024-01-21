<?php

namespace Mobi;

class Mobi
{

    private function path($n = 1)
    {
        $caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $slicePath = explode('/', trim($caminho, '/'));

        // Verifica se $slicePath[$n] existe antes de retornar o valor
        return isset($slicePath[$n]) ? $slicePath[$n] : '';
    }

    public function components($components)
    {
        // Mensagens de erro possíveis
        $message = [
            "erro1" => "<strong>Erro:</strong> Os componentes devem ser declarados dentro de arrays:<br>Exemplo: <em>app->components(['componente1','componente2'])</em>",
            "erro2" => "<strong>Erro:</strong> O componente não foi localizado",
            "erro3" => "Mensagem de erro específica para Erro 3",
        ];

        // Verifica se $components é um array
        if (is_array($components)) {
            // Itera sobre os componentes fornecidos
            foreach ($components as $component) {
                $cmp = ucfirst(strtolower($component));
                $cmpt = "app/components/$cmp/$cmp.controller.php";
                $path = "app/components/$cmp/$cmp.view.php";

                // Verifica se o arquivo do componente existe
                if (file_exists($path)) {
                    if (file_exists($cmpt))
                        require_once($cmpt);
                    $mobi = new Mobi;
                    // Inclui o arquivo do componente
                    echo "<div mb-component='$cmp'>";
                    require_once($path);
                    echo "</div>";
                } else {
                    // Exibe mensagem de erro se o componente não for encontrado
                    echo "<div class='alert alert-danger mx-3' role='alert'><strong>Erro:</strong> O componente $component não foi encontrado em <em>./app/components/$component</em></div>";
                }
            }
        } else {
            // Exibe mensagem de erro se $components não for um array
            echo "<div class='alert alert-danger mx-3' role='alert'>{$message['erro1']}</div>";
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Adds Bootstrap loading commands
    |--------------------------------------------------------------------------
    | $app->loadBootstrap(['css','icon']);
    */
    public function loadBootstrap($types = ['css'])
    {
        $basePath = 'vendor/twbs/bootstrap';

        foreach ($types as $type) {
            switch ($type) {
                case 'css':
                    echo '<link rel="stylesheet" href="/' . $basePath . '/dist/css/bootstrap.min.css">' . "\n";
                    break;
                case 'js':
                    echo '<script src="/' . $basePath . '/dist/js/bootstrap.bundle.min.js"></script>' . "\n";
                    break;
                case 'icon':
                    echo '<link rel="stylesheet" href="/' . $basePath . '-icons/font/bootstrap-icons.min.css">' . "\n";
                    break;
            }
        }
    }

    public function title($type = false)
    {

        // Lê o conteúdo do arquivo JSON
        $jsonConteudo = file_get_contents("./core/json/routes.json");

        // Decodifica o JSON em um array associativo
        $array = json_decode($jsonConteudo, true);

        // Obtém a parte da URI a partir da posição 2
        $uri = "/" . $this->path(2);

        // Variáveis para controle de erro e rota
        $erro = false;
        $route = "";

        // Verifica se o tipo é 'component'
        if ($type == 'component') {
            // Verifica se a chave 'routes' existe no array
            if (isset($array['routes'])) {
                // Itera sobre as rotas
                foreach ($array['routes'] as $routes) {
                    // Verifica se a rota atual corresponde à URI
                    if ($routes['path'] == $uri) {
                        $route = $routes['controller'];
                        break;
                    }
                }

                // Verifica se a rota foi encontrada
                if (!empty($route)) {
                    // Caminho do arquivo do controlador
                    $fileController = "./app/pages/$route/$route.controller.php";

                    // Verifica se o arquivo do controlador existe
                    if (file_exists($fileController)) {
                        // Inclui o arquivo do controlador
                        require_once($fileController);

                        // Cria uma instância do controlador
                        $$route = new $route;

                        // Exibe o título do controlador
                        echo $$route->title;
                    } else {
                        // Exibe mensagem de erro se o arquivo do controlador não for encontrado
                        $msg = "Erro: O arquivo do controlador $route não foi encontrado em $fileController";
                        $errorMessage = "[" . date('Y-m-d H:i:s') . "] [error] $msg.\n";
                        error_log($errorMessage, 3, 'core/error.log');
                    }
                } else {
                    // Exibe mensagem de erro se a rota não for encontrada
                    $msg = "Erro: A rota correspondente à URI $uri não foi encontrada no arquivo JSON de rotas.";
                    $errorMessage = "[" . date('Y-m-d H:i:s') . "] [error] $msg.\n";
                    error_log($errorMessage, 3, 'core/error.log');
                }
            } else {
                // Exibe mensagem de erro se a chave 'routes' não existir no array
                $msg = "Erro: A chave 'routes' não foi encontrada no arquivo JSON de rotas.";
                $errorMessage = "[" . date('Y-m-d H:i:s') . "] [error] $msg.\n";
                error_log($errorMessage, 3, 'core/error.log');
            }

            if(@$msg) echo $msg;
        }
    }

    public function loadJQuery()
    {
        echo "<script src='/node_modules/jquery/dist/jquery.min.js'></script>";
    }

    public function loadMobicss()
    {

        $time = (APP['mode'] == 0) ? "?t=" . time() : '';
        //echo "<link rel='stylesheet' href='/ctrl/mobi.min.css$time'>";
        echo "<link rel='stylesheet' href='/public/css/styleRoot.css$time'>";

    }

    public function loadMobijs()
    {

        $time = (APP['mode'] == 0) ? "?t=" . time() : '';
        echo "<script src='/ctrl/mobi.min.js$time'></script>";

    }
}