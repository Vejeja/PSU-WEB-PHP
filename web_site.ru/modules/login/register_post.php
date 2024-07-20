<?php
    require_once 'db.php';
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = md5($config['salt'] . $password);
        
        $sql = "SELECT COUNT(*) FROM users WHERE username= ?";
        $countUsers = $db->scalar($sql, [$username]);

        if ($countUsers > 0) {
            echo '<div class="container alert alert-danger mt-3" style="max-width: 500px;">Пользователь с таким именем уже существует</div>';
        } else {  
            $sql = "INSERT INTO users (username, password, is_admin) VALUES (?, ?, 0)";
            $result = $db->query($sql, [$username, $hashedPassword]);
            
            if ($result['success']) {
                session_start();
                $sql = "SELECT * FROM users WHERE username = ? AND password= ?";
                $user = $db->query($sql, [$username, $hashedPassword])[0];
                $_SESSION['user_id'] = $user['id']; 
                $_SESSION['username'] = $username;
                
                setcookie("username", $username, time() + 3600, "/");
                header("Location: index.php");
                exit();
            } else {
                echo '<div class="alert alert-danger mt-3" style="max-width: 500px;">Ошибка при регистрации: ' . mysqli_error($db->conn) . '</div>';
            }
        }
    }
?>