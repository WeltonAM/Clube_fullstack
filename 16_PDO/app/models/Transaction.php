<?php

namespace app\models;

use Closure;

class Transaction extends Model
{
    public function transactions(Closure $callback)
    {
        $this->connection->beginTransaction();
        
        try{
            $callback();
            $this->connection->commit();
            
        } catch(\Exception $e) {
            $this->connection->rollBack();
        }
    }

    public function __get($name)
    {
        if(!property_exists($this, $name)){
            $model = __NAMESPACE__ . '\\' . ucfirst($name);

            return new $model();
        }
    }
}