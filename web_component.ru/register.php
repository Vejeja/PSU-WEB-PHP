<?php
require_once "session.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <?php include 'modules/login/register_post.php'; ?>  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Регистрация</h2>
                    <p>Пожалуйста, заполните форму ниже для регистрация.</p>
                    <?php echo $error; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Логин</label>
                            <input type="text" name="login" class="form-control" required>
                        </div>    
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Регистрация">
                        </div>
                        <p>Уже есть аккаунт? <a href="login.php">Войдите</a>.</p>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Вернуться в меню</a>
            </div>
        </div>    
    </body>
</html>