<?php

namespace app\traits;

trait Paginate
{
    protected $limit = 10;
    protected $offset = 0;
    protected $currentPage;
    protected $linksPerPage = 10;

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
        
        $links = '<ul class="pagination">';
        
        for ($i=1; $i < $totalPages; $i++) { 
            $active = $this->currentPage == $i ? 'active' : '';
            $links .= "<li class='page-item {$active}'> <a class='page-link' href='?page={$i}'>{$i}</a></li>";
        }

        $links .= '</ul>';

        return $links;
    }
}