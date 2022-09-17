<?php

namespace app\models;

class Model
{
    public function all()
    {
        return "List database data {$this->table}";
    }
    
    public function findBy()
    {
        
    }
    
    public function delete()
    {
        return "Delete database data {$this->table}";
        
    }
    
    public function update()
    {
        return "Update database data {$this->table}";

    }
}