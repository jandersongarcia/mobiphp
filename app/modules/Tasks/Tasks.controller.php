<?php

class Tasks extends Sql\MySQL {

    public function addTask($data){

        return $this->insert('tasks',$data);

    }

    public function loadAll(){
        return $this->getAll('tasks');
    }

}