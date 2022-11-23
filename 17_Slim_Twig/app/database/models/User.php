<?php

namespace app\database\models;

class User extends Base
{
    protected $table = 'users';

    public function users()
    {
        try {
            $query = $this->connection->query("select SQL_CALC_FOUND_ROWS * from users limit {$this->limit} offset {$this->offset}");

            return [
                'registers' => $query->fetchAll(),
                'total' => $this->connection->query('SELECT FOUND_ROWS()')->fetchColumn()
            ];
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}