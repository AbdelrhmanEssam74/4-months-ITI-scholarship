<?php
session_start();
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id'], $_SESSION['user_email']);
    session_destroy();
    if (isset($_COOKIE['user_id'])) {
        setcookie('user_id', '', time() - 3600, '/');
        setcookie('login', '', time() - 3600, '/');
    }
    header("Location:../index.php");
}
