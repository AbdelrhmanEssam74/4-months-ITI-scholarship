<?php

namespace Controllers;

use Database\Database;
use PDO;

session_start();

class User
{
    private PDO $conn;
    private string $email = '';
    private string $password = '';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
        if (!isset($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }
    }

    public function login(): bool
    {
        $this->setEmail();
        $this->setPassword();

        if (empty($this->email) || empty($this->password)) {
            $_SESSION['errors'][] = "Email and password are required.";
            return false;
        }

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $_SESSION['errors'][] = "No user found with that email.";
            return false;
        }

        if (!password_verify($this->password, $user['password'])) {
            $_SESSION['errors'][] = "Incorrect password.";
            return false;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'] === 'admin' ? 'admin' : 'user';

        if (isset($_POST['remember'])) {
            setcookie('user_id', $user['id'], time() + (86400 * 100), "/");
            setcookie('login', true, time() + (86400 * 100), "/");
        }

        return true;
    }

    private function setEmail(): void
    {
        $this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '';
    }

    private function setPassword(): void
    {
        $this->password = $_POST['password'] ?? '';
    }
}
