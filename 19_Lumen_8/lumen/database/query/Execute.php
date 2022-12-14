<?php

namespace Database\Query;

class Execute
{
    private $queries;

    public function setQuery($queries)
    {
        $this->queries = $queries;
    }

    public function execute($builder)
    {
        $connection = Connection::open();
        $response = $builder->execute($this->queries);

        $prepare = $connection->prepare($response['query']);
        $prepare->execute();

        if($builder instanceof Select){
            $fetch = $response['fetchAll'] ? $prepare->fetchAll() : $prepare->fetch();
        }

        dd($fetch);
    }
}
