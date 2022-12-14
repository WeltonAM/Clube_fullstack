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
        // dd($prepare);
        $executed = $prepare->execute($this->queries['binds']);
        

        if($builder instanceof Select){
            $fetch = $response['fetchAll'] ? $prepare->fetchAll() : $prepare->fetch();
            
            if($this->queries['paginate']){
                $count = $connection->query('select FOUND_ROWS()')->fetchColumn();

                return [
                    'rows' => $fetch,
                    'count' => $count,
                    'links' => RenderLinks::render($count, $this->queries['limit']),
                ];
            }

            return ['rows' => $fetch];
        }

        return $executed;

    }
}
