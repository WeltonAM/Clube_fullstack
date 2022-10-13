<?php

namespace app\models;

use app\models\Connection;

abstract class Model
{
    public function __construct(private Connection $connection)
    {
    }

    public function all()
    {
        
    }

    public function find()
    {

    }

    public function delete()
    {

    }

}