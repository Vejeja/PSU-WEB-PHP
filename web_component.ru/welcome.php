<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Привет, <?php echo $_SESSION["login"]; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                    <h1>Привет, <strong><?php echo $_SESSION["login"]; ?></strong>.</h1>
            </div>
            <div class="row justify-content-center">
                <a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Выйти</a>
            </div>
        </div>
    </body>
</html>