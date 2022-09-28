<?php

namespace app\database\activerecord;

use ReflectionClass;

abstract class ActiveRecord
{

    protected $table = null;
    protected $attributes = [];

    public function __construct()
    {
        if(!$this->table){
            $this->table = strtolower((new ReflectionClass($this))->getShortName());
        }
    }

    public function getTable()
    {
        return $this->table;
    }    

    public function getAttributes()
    {
        return $this->attributes;
    }    
    
    public function __set($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }    
    
    public function __get($attribute)
    {
        return $this->attributes[$attribute];
    }    

    public function update()
    {

    }
    
    public function delete()
    {

    }
}