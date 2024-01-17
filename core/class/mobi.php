<?php

namespace Mobi;

class Mobi
{
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
                    if(file_exists($cmpt)) require_once($cmpt);
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

    public function loadJQuery()
    {
        echo "<script src='/node_modules/jquery/dist/jquery.min.js'></script>";
    }

    public function loadMobicss()
    {

        $time = (APP['mode'] == 0) ? "?t=".time() : '';
        //echo "<link rel='stylesheet' href='/ctrl/mobi.min.css$time'>";
        echo "<link rel='stylesheet' href='/public/css/styleRoot.css$time'>";

    }

    public function loadMobijs()
    {

        $time = (APP['mode'] == 0) ? "?t=".time() : '';
        echo "<script src='/ctrl/mobi.min.js$time'></script>";

    }
}