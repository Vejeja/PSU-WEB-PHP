<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $itemId = $_POST['id'];
    $userId = $_SESSION['user_id'];

    $sql = "INSERT INTO cart (user_id, item_id) VALUES (?, ?)";
    $db->query($sql, [$userId, $itemId]);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>