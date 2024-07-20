<style>
#div_paginator {
    display: inline;
}
#paginator_css ul,li{
    display: inline;
    padding:3%;
}
</style>
<?php
    function paginator_navbar($total, $limit){

        $currentPage = isset($_GET['p']) ? $_GET['p'] : 1;
        $totalPages = ceil($total / $limit);

        $html = '<nav aria-label="Навигация">';
        $html .= '<ul class="pagination justify-content-center mt-3">';
        if ($currentPage > 1) {
            $html .= '<li class="page-item">';
            $html .= '<a class="page-link"  href="?page=' . $currentPage - 1 . '">Предыдущая</a>';
            $html .= '</li>';
        } else {
            $html .= '<li class="page-item disabled">';
            $html .= '<a class="page-link" href="#!">Предыдущая</a>';
            $html .= '</li>';
        }
        $startPage = max(1, $currentPage - 1);
        $endPage = min($totalPages, $currentPage + 1);
    
        if ($startPage > 1):
            $html .= '<li class="page-item">';
            $html .= '<a class="page-link" href="?p=1">1</a>';
            $html .= '</li>';
            if ($startPage > 2):
                $html .= '<li class="page-item disabled">';
                $html .= '<span class="page-link">...</span>';
                $html .= '</li>';
            endif;
        endif;
    
        for ($i = $startPage; $i <= $endPage; $i++):
            $html .= '<li class="page-item ' . ($currentPage == $i ? 'active' : ''). '">';
            $html .= '<a class="page-link" href="?p='.$i.'">'.$i.'</a>';
            $html .= '</li>';
        endfor;
    
        if ($endPage < $totalPages):
            if ($endPage < $totalPages - 1):
                $html .= '<li class="page-item disabled">';
                $html .= '<span class="page-link">...</span>';
                $html .= '</li>';
            endif;
            $html .= '<li class="page-item">';
            $html .= '<a class="page-link" href="?p=' .$totalPages . '">'.$totalPages.'</a>';
            $html .= '</li>';
        endif;
    
        if ($currentPage < $totalPages) {
            $html .= '<li class="page-item">';
            $html .= '<a class="page-link" href="?p=' .$currentPage + 1 . '">Следующая</a>';
            $html .= '</li>';
        } else {
            $html .= '<li class="page-item disabled">';
            $html .= '<a class="page-link" href="#!">Следующая</a>';
            $html .= '</li>' ;
        }
        $html .= '</ul>';
        $html .= '</nav>';
        $html .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';
    
        return $html;
    }
    
    function limit_query($sql, $total, $limit){ 
        $params = $_SERVER['QUERY_STRING'];
        parse_str($params, $p);
        if(isset($p['p']) && is_numeric($p['p']) && ($p['p'] > 0)){
            $currentPage = $p['p'];
            $startPage = ($currentPage * $limit) - $limit;
        } else {
            $startPage = 0;
            $currentPage = 1;
        }
        if ($startPage > $total)
            $startPage = $total-$limit;
        return $sql . ' LIMIT ' . $startPage . ',' . $limit;

    }