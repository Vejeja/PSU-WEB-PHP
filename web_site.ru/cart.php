<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require_once 'db.php';

$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM cart INNER JOIN items ON cart.item_id = items.id WHERE cart.user_id=?";
$cartItems = $db->query($sql, [$userId]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/ico.ico" type="image/x-icon">
</head>
<body>
    <?php include 'modules/general/header.php'; ?>
    <main> 
        <div class="container">
            <h1>Корзина</h1>
            <?php foreach ($cartItems as $cartItem) : ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $cartItem['image_link']; ?>" alt="<?php echo $cartItem['name']; ?>" class="img-fluid card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $cartItem['name']; ?></h5>
                                <p class="card-text"><?php echo $cartItem['description']; ?></p>
                                <p class="card-text"><?php echo $cartItem['price']; ?> руб.</p>
                                <?php if (!isset($_SESSION['username'])) {
                                    echo '<a href="login.php" class="btn btn-warning">Убрать из корзины</a>';
                                } else {
                                    echo '<a class="btn btn-warning" onclick="removeFromCart(' . $cartItem['id'] . ')">Убрать из корзины</a>';
                                }?>  
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </main>     
    <?php include 'modules/general/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/remove-from-cart.js"></script> 
</body>
</html>