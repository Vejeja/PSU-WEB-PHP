<?php
    require_once 'db.php';
?>

<nav>
    <a href="index.php" class="navlink">Главная</a>
    <?php if (!isset($_SESSION['username'])) { ?>
            <a href="login.php" class="navlink">Войти</a>
            <a href="register.php" class="navlink">Регистрация</a>
    <?php } else { 
            $userId = $_SESSION['user_id'];
            $sql = "SELECT COUNT(*) as count FROM cart WHERE user_id = ?";

            $cartItemCount = $db->scalar($sql, [$userId]);
            ?>
            <a href="cart.php" class="navlink">Корзина  <span class="badge bg-secondary"><?php echo $cartItemCount; ?></span></a>
            <form method="POST">
                <button class="navlink" type="submit" name="logout">
                    <img src="images/logout.png" alt="">
                </button>
            </form>
    <?php } ?>
</nav>