<?php

namespace app\database\builder;

use app\database\Connection;

class Paginate
{
    private int $currentPage = 1;
    private string $pageIdentification = 'page';
    private int $itensPerPage = 10;
    private int $totalPages;
    private int $offset = 0;
    private int $totalItems;
    private array $binds;

    public function setItensPerPage(int $itensPerPage)
    {
        $this->itensPerPage = $itensPerPage;
    }

    public function setPageIdentification(string $pageIdentification)
    {
        $this->pageIdentification = $pageIdentification;
    }

    public function setQueryCount(string $queryCount)
    {
        $this->queryCount = $queryCount;
    }

    public function setBinds(array $binds)
    {
        $this->binds = $binds;
    }

    private function calculations()
    {
        $this->currentPage = isset($_GET[$this->pageIdentification]) ? (int)$_GET[$this->pageIdentification] : 1;

        $this->offset = ($this->currentPage - 1) * $this->itensPerPage;

        $this->totalPages = ceil($this->totalItems / $this->itensPerPage);
    }

    private function getCount()
    {
        $connection = Connection::getConnection();
        $prepare = $connection->prepare($this->queryCount);
        $prepare->execute($this->binds);

        $this->totalItems = $prepare->fetchObject()->count;
    }

    public function render()
    {

    }

    public function queryToPaginate()
    {
        $this->getCount();
        $this->calculations();

        return " limit {$this->itensPerPage} offset {$this->offset}";
    }
}