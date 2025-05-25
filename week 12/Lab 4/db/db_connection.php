<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=php_lab4', 'root', '');
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}