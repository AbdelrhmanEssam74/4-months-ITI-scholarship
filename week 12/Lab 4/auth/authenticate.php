<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    require_once '../db/db_connection.php';

    $_SESSION['errors'] = [];

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['errors'][] = "Email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            $_SESSION['errors'][] = "No user found with that email.";
        } else {
            $user = $result[0];
            if (!($password === $user['password'])) {
                $_SESSION['errors'][] = "Incorrect password.";
            }
        }
    }

    if (!empty($_SESSION['errors'])) {
        header("Location: ../index.php");
        exit;
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    if ($user['role'] === 'admin') {
        $_SESSION['user_role'] = 'admin';
    } else {
        $_SESSION['user_role'] = 'user';
    }

    if (isset($_POST['remember'])) {
        setcookie('user_id', $user['id'], time() + (86400 * 100), "/");
        setcookie('login', true, time() + (86400 * 100), "/");
    }

    header("Location: ../dashboard.php");
    exit;
}
