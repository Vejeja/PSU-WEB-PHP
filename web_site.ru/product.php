<?php
require_once 'db.php';
session_start();

$id = $_GET['id'];

$item = $db->query("SELECT * FROM items WHERE id = ? LIMIT 1", [$id])[0];
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Карточка товара</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/ico.ico" type="image/x-icon">
    </head>
    <body>
        <?php include 'modules/general/header.php'; ?>
        <main>
            <h1><?php echo $item['name']; ?></h1>
            <div class="container">
                <img class="img-fluid" src="<?php echo $item['image_link']; ?>" alt="<?php echo $item['name']; ?> ">
                <p><?php echo $item['description']; ?></p>
                <p><?php echo $item['price']; ?> руб.</p>  
                <?php if (!isset($_SESSION['username'])) {
                    echo '<a href="login.php" class="btn btn-warning">Добавить в корзину</a>';
                } else {
                    echo '<a class="btn btn-warning" onclick="addToCart(' . $item['id'] . ')">Добавить в корзину</a>';
                }?>  
            </div>
        </main>
        <?php include 'modules/general/footer.php'; ?>  
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="scripts/add-to-cart.js"></script>     
    </body>
</html>