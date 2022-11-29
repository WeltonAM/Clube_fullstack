<?php

namespace app\database\builder;

class ReadQuery extends Builder
{
    private ?string $table = null;
    private ?string $fields = null;
    private string $order;
    private string $group;
    private array $join = [];

    public static function select(string $fields = '*')
    {
        $self = new Self;
        $self->fields = $fields;

        return $self;
    }

    public function from(string $table)
    {
        $this->table = $table;
        
        return $this;
    }

    public function order(string $field, string $value)
    {
        $this->order = " order by {$field} {$value}";

        return $this;
    }

    public function group(string $field)
    {
        $this->group = " group by {$field}";

        return $this;
    }

    public function join(string $foreignTable, string $logic, string $type = 'inner')
    {
        $this->join[] = " {$type} join {$foreignTable} on {$logic}";

        return $this;
    }

    public function createQuery(bool $count = false)
    {
        if(!$this->fields){
            throw new \Exception("Needs to call the select");
        }

        if(!$this->table){
            throw new \Exception("Needs to call the table");
        }

        $query = ($count) ? 'select count(*) as count ' : 'select ';
        $query .= (!$count) ? $this->fields . ' from ' : 'from ';
        $query .= $this->table;
        $query .= !empty($this->join) ? implode(' ', $this->join) : '';
        $query .= !empty($this->where) ? ' where ' . implode(' ', $this->where) : '';
        $query .= $this->group ?? '';
        $query .= $this->order ?? '';

        return $query;
    }

    public function get()
    {
        $query = $this->createQuery();

        try {
            $prepare = $this->executeQuery($query);

            return $prepare->fetchAll();
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function first()
    {
        $query = $this->createQuery();

        try {

            $prepare = $this->executeQuery($query);

            return $prepare->fetchObject();
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function paginate(int $itensPerPage = 10)
    {
        $paginate = new Paginate;
        $paginate->setItensPerPage($itensPerPage);
        $paginate->setPageIdentification('page');
        $query = $this->createQuery(count:true);
        $paginate->setQueryCount($query);
        $paginate->setLinksPerPage(10);
        $paginate->setBinds($this->binds ?? []);
        
        $queryToPaginate = $this->createQuery();
        $queryToPaginate .= $paginate->queryToPaginate();

        $prepare = $this->executeQuery($queryToPaginate, returnExecute: false);

        return (object)['rows' => $prepare->fetchAll(), 'render' => $paginate->render()];
    }
}