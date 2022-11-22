<?php

namespace app\traits;

trait Paginate
{
    protected $limit = 10;
    protected $offset = 0;
    protected $currentPage;
    protected $linksPerPage = 5;

    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function setCurrentPage()
    {
        $this->currentPage = $_GET['page'] ?? 1;

        $this->offset = ($this->currentPage - 1) * $this->limit;

        return $this;
    }

    public function totalPages($total)
    {
        return ceil($total / $this->limit);
    }

    public function renderLinks($totalRegisters)
    {
        $totalPages = $this->totalPages($totalRegisters);

        $startLinks = 1;
        if($this->currentPage > $this->linksPerPage){
            $startLinks = $this->currentPage - $this->linksPerPage;
        }

        $endLinks = $totalPages;
        if(($this->currentPage + $this->linksPerPage) < $totalPages){
            $endLinks = $this->currentPage + $this->linksPerPage;
        }
        
        $links = '<ul class="pagination">';

        if($this->currentPage > 1){
            $links .= "<li class='page-item'> <a class='page-link' href='?page=1'>Fisrt</a></li>";
        }
        
        for ($i=1; $i <= $endLinks; $i++) { 
            $active = $this->currentPage == $i ? 'active' : '';
            $links .= "<li class='page-item {$active}'> <a class='page-link' href='?page={$i}'>{$i}</a></li>";
        }

        if($this->currentPage < $totalPages){
            $links .= "<li class='page-item'> <a class='page-link' href='?page={$totalPages}'>Last</a></li>";
        }

        $links .= '</ul>';

        return $links;
    }
}