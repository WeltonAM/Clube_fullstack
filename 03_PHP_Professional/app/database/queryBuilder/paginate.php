<?php


function paginate($perPage = 10)
{
    global $query;

    if(isset($query['limit'])){
        throw new Exception("O Paginate não pode ser chamada com o Limit");
    }

    $rowCount = execute(rowCount:true);

    $page = filter_input(INPUT_GET, 'page',);

    $page = $page ?? 1;

    $query['currentPage'] = (int)$page;

    $query['pageCount'] = (int)ceil($rowCount / $perPage);
    $offSet = ($page - 1) * $perPage;

    $query['paginate'] = true;

    $query['sql'] = "{$query['sql']} limit {$perPage} offset {$offSet}";
}

function render()
{

    global $query;

    $pageCount = $query['pageCount'];
    $currentPage = $query['currentPage'];
    $maxLinks = 2;

    $links = '<ul class="pagination">';
    $active = '';
    for ($i=$currentPage - $maxLinks; $i <= $currentPage + $maxLinks ; $i++) { 
        if($i > 0 && $i <= $pageCount){
            $active = $currentPage === $i ? 'active' : '';
            $linkPage = http_build_query(array_merge($_GET,['page' => $i]));
            $links .= "<li class='page-item {$active}'><a href='?{$linkPage}' class='page-link'>{$i}</a></li>";
        }
    }
    $links .= '</ul>';

    return $links;
}