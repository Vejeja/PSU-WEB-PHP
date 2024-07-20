<?php
include 'config.php';
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($config['salt'] . $password);

    if (empty($username)) {
        $error .= '<p class="error">Пожалуйста, введите логин.</p>';
    }

    if (empty($password)) {
        $error .= '<p class="error">Пожалуйста, введите пароль.</p>';
    }

    if (empty($error)) {
        $sqlUserCount = "SELECT COUNT(*) FROM users WHERE username = ?";
        $userCount = $db->scalar($sqlUserCount, [$login]);
        
        if ($userCount>0) {
            $sqlUser = "SELECT * FROM users WHERE username = ?";
            $user = $db->query($sqlUser, [$login])[0];
            $id = $user['id'];
            $pass = $user['password'];

            if ($user['password']===$hashedPassword) {
                $_SESSION["userid"] = $id;
                $_SESSION["login"] = $login;
                header("location: welcome.php");
                exit;
            } else {
                $error .= '<p class="error">Неверный пароль.</p>';
            }
        } else {
            $error .= '<p class="error">Нет пользователя с таким логином.</p>';
        }
    }
}
?>