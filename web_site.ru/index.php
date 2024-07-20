<?php
require_once 'db.php';
session_start();

include 'modules/paging/paging_navbar.php'; 
include 'modules/paging/paging_items.php';

$url = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Каталог товаров</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/ico.ico" type="image/x-icon">
    </head>
    <body>
        <?php include 'modules/general/header.php'; ?>
        <main>
                <h1>Каталог товаров</h1>
                <?php echo paginator_items($items);?>
                <?php echo paginator_navbar($currentPage, $totalPages, $url);?>
        </main>
        <?php include 'modules/general/footer.php'; ?>       
    </body>
</html>