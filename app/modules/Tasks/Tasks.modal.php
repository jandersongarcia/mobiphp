<?php

// Modal Tasks
// A classe deste módulo é $mTasks

if (isset($_GET['action'])) {

    echo $mTasks->loadAll();

} else {

    $formData = $_POST;

    $formData['id'] = (empty($formData['id'])) ? null : $formData['id'];

    // VERIFICA SE O ID ESTÁ PREENCHIDO
    if ($formData['id']) {

    } else {
        // INSERE OS DADOS NA TABELA
        echo $mTasks->addTask($formData);

    }
}