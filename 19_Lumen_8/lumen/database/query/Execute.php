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

        
        $prepare = $connection->prepare($sql);
        $prepare->execute($this->queries['binds']);
        
        // dd($sql);

        if($builder instanceof Select){
            $fetch = $response['fetchAll'] ? $prepare->fetchAll() : $prepare->fetch();

            $count = $connection->query('select FOUND_ROWS()')->fetchColumn();
            
            $data = [
                'rows' => $fetch,
                'count' => $count,
                // 'rows' => $fetch,
            ];

            dd($data);
        }

    }
}
