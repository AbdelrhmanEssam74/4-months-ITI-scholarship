<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
require_once '../db/db_connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM employees WHERE employee_id = :id");
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Employee deleted successfully";
        header("Location: ../employees.php");
        exit();
    } else {
        $_SESSION['failed'] = "Error deleting employee: ";
        header("Location: ../employees.php");
        exit();
    }
} else {
    $_SESSION['not-fount'] = "No employee ID provided";
    header("Location: ../employees.php");
}