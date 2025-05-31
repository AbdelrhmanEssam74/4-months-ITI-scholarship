<?php
require_once '../../../vendor/autoload.php';
use Controllers\User;


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['errors'] = [];

    $user = new User();

    if (!$user->login()) {
        header("Location: ../../../index.php");
        exit;
    }

    header("Location: ../../../dashboard.php");
    exit;
}
