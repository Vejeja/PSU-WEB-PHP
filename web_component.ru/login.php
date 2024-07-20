<?php
include "db.php";
require_once "session.php";
$error = '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <?php include 'modules/login/login_post.php'; ?>  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Вход</h2>
                    <p>Пожалуйста, введите логин и пароль.</p>
                    <?php echo $error; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Логин</label>
                            <input type="login" name="login" class="form-control" required />
                        </div>    
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Войти">
                        </div>
                        <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a>.</p>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Вернуться в меню</a>
            </div>
        </div>     
    </body>
</html>