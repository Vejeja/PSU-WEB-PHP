<?php

session_start();
if(isset($_SESSION['user_id'])) {
  
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/ico.ico" type="image/x-icon">
</head>
<body>
    <?php include 'modules/general/header.php'; ?>
    <main>
        <div class="container mt-5" style="max-width: 500px;">
            <h1>Регистрация</h1>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Имя пользователя:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
        <?php include 'modules/login/register_post.php'; ?>
    </main>
    <?php include 'modules/general/footer.php'; ?>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>