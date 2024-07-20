<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_SESSION['user_id'])) {
    $itemId = $_POST['id'];
    $userId = $_SESSION['user_id'];

    $sql = "DELETE FROM cart WHERE item_id = ? AND user_id = ? LIMIT 1";
    $result = $db->query($sql, [$itemId, $userId]);

    if ($result['success']) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Ошибка удаления из корзины: " . mysqli_error($db->conn);
    }
} else {
    echo "Неверные параметры запроса";
}
?>