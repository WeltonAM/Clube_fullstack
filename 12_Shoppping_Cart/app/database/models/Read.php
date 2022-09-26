<?php 

namespace app\database\models;

// use app\database\Connect;

class Read extends Model
{
    public function all($table, $field = '*')
    {
        try {
            $query = $this->connect->query("select {$field} from {$table}");
            $query->execute();

            return $query->fetchAll();
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
        }
    }
}