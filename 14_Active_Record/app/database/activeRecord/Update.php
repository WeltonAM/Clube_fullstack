<?php

namespace app\database\activerecord;

use app\database\interfaces\UpdateInterface;

class Update implements UpdateInterface
{
    public function update()
    {
        throw new Exception("Error Processing Request", 1);
    }
}