<?php
class Tasks extends Sql\MySQL {

    public function addTask($data) {
        return $this->insert('tasks', $data);
    }

    public function loadAll() {
        return $this->getAll('tasks');
    }

    public function getId($data){
        return $this->getById('tasks','id',$data);
    }

    public function concluedTask($data){
        return $this->update("tasks", ['concluded' => 1], $data);
    }

    public function updateTask($data){
        return $this->update("tasks", $data, $data['id']);
    }

    public function deleteTask($data){
        return $this->delete("tasks", $data);
    }
}
