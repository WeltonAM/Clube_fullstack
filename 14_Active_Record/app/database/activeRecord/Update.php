<?php

namespace app\database\activerecord;

use app\database\connection\Connection;
use app\database\interfaces\ActiveRecordInterface;
use app\database\interfaces\ActiveRecordExecuteInterface;

class Update implements ActiveRecordExecuteInterface
{

    public function __construct(private string $field, private string $value)
    {
    }

    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $attributes = array_merge($activeRecordInterface->getAttributes(), [
                $this->field => $this->value
            ]);

            // var_dump($query);
            // die();

            $prepare = $connection->prepare($query);

            $prepare->execute($attributes);

            return $prepare->rowCount();
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if(array_key_exists('id', $activeRecordInterface->getAttributes())){
            throw new \Exception("Id must be informed in the query");
        }

        $sql = "update {$activeRecordInterface->getTable()} set ";
        
        foreach($activeRecordInterface->getAttributes() as $key => $value){
            $sql .= "{$key}=:{$key},";
        }

        $sql = rtrim($sql, ',');
        $sql .= " where {$this->field} = :{$this->field}";

        return $sql;
    }
}