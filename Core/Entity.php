<?php

namespace Core;

class Entity {

    private $orm;

    public function __construct(){

        $this->orm = new \Core\ORM;
    }

    public function read($table, $id){

        return $this->orm->read($table, $id);
    
    }

    public function read_all($table){

        return $this->orm->read_all($table);
    
    }

    public function create($table, $fields){
    
        $this->orm->create($table, $fields);
    
    }

    public function update($table, $id, $fields){
    
        $this->orm->update($table, $id, $fields);
    
    }

    public function delete($table, $id){
    
        $this->orm->delete($table, $id);
    
    }
}