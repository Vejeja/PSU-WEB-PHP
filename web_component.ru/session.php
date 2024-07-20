<?php
session_start();

if (isset($_SESSION['userid'])) {
    header("Location: welcome.php");
    exit;
}
?>