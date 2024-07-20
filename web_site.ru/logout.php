<?php
if (isset($_POST['logout'])) :
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie("username", "", time() - 3600, "/");
    header('Location: index.php');
    exit();
endif;