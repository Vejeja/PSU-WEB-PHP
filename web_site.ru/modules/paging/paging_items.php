<?php
require_once 'db.php';

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 3;

$limit = $itemsPerPage;
$offset = ($currentPage - 1) * $itemsPerPage;

$sqlCount = "SELECT COUNT(*) AS total FROM items";
$totalItems = $db->scalar($sqlCount);

$totalPages = ceil($totalItems / $itemsPerPage);

$sql = "SELECT * FROM items LIMIT ? OFFSET ?";
$items = $db->query($sql, [$limit, $offset]);

function paginator_items($items){
    $html = '<div class="row">';
    foreach ($items as $item):
        $html .= '<div class="col-md-6 col-xl-3 gy-3">';
        $html .= '<div class="card">';
        $html .= '<a href="product.php?id=' . $item['id'] . '" class="survey-card">';
        $html .= '<img src="' . $item['image_link'] . '" class="img-fluid" alt="' . $item['name'] . '">';
        $html .= '</a>';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">' . $item['name'] . '</h5>';
        $html .= '<p class="card-text">' . $item['price'] . ' руб.</p>';                    
        if (!isset($_SESSION['username'])) {
            $html .= '<a href="login.php" class="btn btn-warning">В корзину</a>';
        } else {
            $html .= '<a class="btn btn-warning" onclick="addToCart(' . $item['id'] . ')">В корзину</a>';
        }
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    endforeach;
    $html .= '</div>';
    
    $html .= '<script src="scripts/add-to-cart.js"></script>';
    $html .= '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    $html .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';

    return $html;
}
?>