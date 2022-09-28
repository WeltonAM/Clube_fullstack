<?php

namespace app\database\activerecod;

use app\database\interface\UpdateInterface;

class UpdateUser implements UpdateInterface
{
    public function update()
    {
        throw new \Exception("Error Processing Request", 1);
        
    }
}