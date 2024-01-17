<?php

// Obtem o nome do arquivo de controller com base no caminho do aplicativo
$page = "controller.{$app->path(1)}.php";
$ctrl = "{$app->path(1)}.controller.php";

// Verifica se o arquivo de controller no diretório 'app/controllers' existe
if (file_exists("app/controllers/$ctrl")) {
    
    // Verifica se o cabeçalho é válido ou se o modo de aplicativo é 0 (sem verificação de cabeçalho)
    if ($app->checkHeader() || APP['mode'] == 0) {
        // Inclui o arquivo de controller
        require_once("app/controllers/$ctrl");
        if (class_exists("$ctrl")) {
            $$ctrl = new $ctrl;
        } else {
            // Trate o caso em que a classe não existe
            $errorMessage = "Classe $ctrl não encontrada.";
            error_log($errorMessage, 3, 'caminho/para/seu/arquivo/error.log');
        }
    } else {
        // Mensagem de erro se o acesso ao controller for negado
        $msg = [
            'type' => 'error',
            'msg' => 'Access to controller denied'
        ];

        // Retorna a mensagem de erro como JSON
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }
} else if (file_exists("core/php/controller/$page")) {
    // Inclui o arquivo de controller a partir do diretório 'core/php/controller' se o arquivo não for encontrado no diretório 'app/controllers'
    require_once("core/php/controller/$page");
} else {
    // Mensagem de erro se o arquivo de controller não for encontrado em ambos os diretórios
    $msg = [
        'type' => 'error',
        'msg' => 'Controller not found'
    ];

    // Retorna a mensagem de erro como JSON
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}
