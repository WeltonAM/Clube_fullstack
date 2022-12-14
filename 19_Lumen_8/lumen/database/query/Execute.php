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

        $sql = SqlRaw::raw($response['query'], $this->queries);

        // dd($sql);

        $prepare = $connection->prepare($sql);
        $prepare->execute();

        if($builder instanceof Select){
            $fetch = $response['fetchAll'] ? $prepare->fetchAll() : $prepare->fetch();

            dd($fetch);
            return ['rows' => $fetch];
        }

    }
}
