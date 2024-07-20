<?php
function paginator_navbar($currentPage, $totalPages, $url){
    $html = '<nav aria-label="Навигация">';
    $html .= '<ul class="pagination justify-content-center mt-3">';
    if ($currentPage > 1) {
        $html .= '<li class="page-item">';
        $html .= '<a class="page-link"  href="' . $url . '?page=' . $currentPage - 1 . '">Предыдущая</a>';
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
        $html .= '<a class="page-link" href="' . $url . '?page=1">1</a>';
        $html .= '</li>';
        if ($startPage > 2):
            $html .= '<li class="page-item disabled">';
            $html .= '<span class="page-link">...</span>';
            $html .= '</li>';
        endif;
    endif;

    for ($i = $startPage; $i <= $endPage; $i++):
        $html .= '<li class="page-item ' . ($currentPage == $i ? 'active' : ''). '">';
        $html .= '<a class="page-link" href="' . $url . '?page='.$i.'">'.$i.'</a>';
        $html .= '</li>';
    endfor;

    if ($endPage < $totalPages):
        if ($endPage < $totalPages - 1):
            $html .= '<li class="page-item disabled">';
            $html .= '<span class="page-link">...</span>';
            $html .= '</li>';
        endif;
        $html .= '<li class="page-item">';
        $html .= '<a class="page-link" href="' . $url . '?page=' .$totalPages . '">'.$totalPages.'</a>';
        $html .= '</li>';
    endif;

    if ($currentPage < $totalPages) {
        $html .= '<li class="page-item">';
        $html .= '<a class="page-link" href="' . $url . '?page=' .$currentPage + 1 . '">Следующая</a>';
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