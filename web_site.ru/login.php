<?php

session_start();
if(isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/ico.ico" type="image/x-icon">
</head>

<body>
    <?php include 'modules/general/header.php'; ?>
    <main> 
    <div class="container mt-5" style="max-width: 500px;">
        <h1>Вход</h1>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Имя пользователя:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <p class="mt-3">Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
    </div>
    <?php include 'modules/login/login_post.php'; ?>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </main>
    <?php include 'modules/general/footer.php'; ?>  
</body>
</html>