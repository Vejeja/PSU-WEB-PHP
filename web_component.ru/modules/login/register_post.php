<?php
require_once 'db.php';
include 'config.php';
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($config['salt'] . $password);
    
    $sql = "SELECT COUNT(*) FROM users WHERE username= ?";
    $countUsers = $db->scalar($sql, [$username]);

    if ($countUsers > 0) {
        $error .= '<p class="error">Пользователь уже существует!</p>';
    } else {
        if (strlen($password ) < 6) {
            $error .= '<p class="error">Пароль должен имень как минимум 6 символов.</p>';
        }
        if (empty($error) ) {
            $sql = "INSERT INTO users (username, password, is_admin) VALUES (?, ?, 0)";
            $result = $db->query($sql, [$username, $hashedPassword]);
            if ($result['success']) {
                $error .= '<p class="success">Вы зарегистрировались!</p>';
            } else {
                $error .= '<p class="error">Что-то пошло не так!</p>';
            }
        }
    }
}
?>