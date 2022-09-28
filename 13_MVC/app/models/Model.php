<?php

namespace app\models;

use app\classes\Bind;

abstract class Models
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Bind::get('connection');
    }

    public function all()
    {
        $sql = "select * from {$this->table}";

        $list = $this->connection->query($sql);
        $list->execute();

        return $list->fetchAll();
    }
}