<?php

namespace app\database\models;

class User extends Base
{
    protected $table = 'users';

    public function users()
    {
        try {
            // $query = $this->connection->query("");

            return [
                'registers' => [],
                'total' => 0
            ];
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}