<?php

// O objeto representando a classe deste módulo é $mTasks

// Verifica se a ação foi definida na requisição
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if($action == 'check' && isset($_GET['id'])){
        $id = $_GET['id'];
        if ($mTasks->getId($id)){
            echo $mTasks->concluedTask($id);
        };
    } else if($action == 'delete' && isset($_GET['id'])){
        $id = $_GET['id'];
        if ($mTasks->getId($id)){
            echo $mTasks->deleteTask($id);
        };
    } else if($action == 'edit' && isset($_GET['id'])){
        $id = $_GET['id'];
        echo $mTasks->getId($id);
    } else {
        // Se a ação estiver presente, carrega todas as tarefas
        echo $mTasks->loadAll();
    }
    
} else if(count($_POST) > 0) {
    // Se não houver ação, trata os dados do formulário
    $formData = $_POST;
    $formData['id'] = (empty($formData['id'])) ? null : $formData['id'];

    // Verifica se o ID está preenchido
    if (!is_null($formData['id'])) {
        // Verifica se o registro existe
        echo $mTasks->updateTask($formData);
        // Lógica relacionada à atualização da tarefa (caso o ID esteja preenchido)
    } else {
        // Se o ID não estiver preenchido, insere os dados na tabela de tarefas
        echo $mTasks->addTask($formData);
    }
}
