<?php

// O objeto representando a classe deste módulo é $mTasks

// Verifica se a ação foi definida na requisição
if (isset($_GET['action'])) {
    // Se a ação estiver presente, carrega todas as tarefas
    echo $mTasks->loadAll();
} else {
    // Se não houver ação, trata os dados do formulário
    $formData = $_POST;
    $formData['id'] = (empty($formData['id'])) ? null : $formData['id'];

    // Verifica se o ID está preenchido
    if ($formData['id']) {
        // Lógica relacionada à atualização da tarefa (caso o ID esteja preenchido)
    } else {
        // Se o ID não estiver preenchido, insere os dados na tabela de tarefas
        echo $mTasks->addTask($formData);
    }
}
