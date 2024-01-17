<?php

use MatthiasMullie\Minify;
use Languages\Language;

$routes = $app->listRoutes();

$page = "/" . ucfirst(strtolower($app->path(2)));

if ($app->checkHeader() || APP['mode'] == 0) {
    if (empty($routes['data']['routes'])) {
        echo json_encode($routes, JSON_UNESCAPED_UNICODE);
    } else {

        foreach ($routes['data']['routes'] as $route) {
            $controllerName = $route['controller'];
            $path = "app/pages/$controllerName/$controllerName.view.php";
            $cssPath = "app/pages/$controllerName/$controllerName.css";
            //$jsPath = "app/pages/$controllerName/$controllerName.js";
            $ctrlPath = "app/pages/$controllerName/$controllerName.controller.php";

            if (file_exists($path) && $route['path'] == $page) {

                // REALIZA O TRATAMENTO DOS COMPONENTES
                if (file_exists($ctrlPath)) {
                    $lang = new Languages\Language;
                    require_once($ctrlPath);
                }

                if (file_exists($cssPath)) {
                    // Inicializa a string que conterá todos os estilos
                    $allStyles = file_get_contents($cssPath);
                
                    if (isset($controller) && is_array($controller) && isset($controller['components'])) {
                        foreach ($controller['components'] as $key => $value) {
                            $cmpValue = ucfirst(strtolower($value));
                            $cmpPath = "app/components/$cmpValue/$cmpValue.css";
                
                            if (file_exists($cmpPath)) {
                                // Adiciona estilos do componente à string
                                $allStyles .= file_get_contents($cmpPath);
                            }
                        }
                    }
                
                    // Utiliza o Minify\CSS para compactar os estilos
                    $minifier = new Minify\CSS();
                    $minifier->add($allStyles);
                
                    // Adiciona a tag de estilo com os estilos compactados
                    echo "<style>" . $minifier->minify() . "</style>";
                }
                
                require_once($path);
                global $lang;
                
                break;
            }
        }
    }
} else {
    $return = ['type' => '403', "message" => "Acesso negado!"];
    echo json_encode($return);
}