<?php
session_start();
include '../db/db_connection.php';

$_SESSION['errors'] = [];
$_SESSION['old'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deptName = trim($_POST['department_name'] ?? '');
    $deptDesc = trim($_POST['department_description'] ?? '');

    $_SESSION['old'] = [
        'department_name' => $deptName,
        'department_description' => $deptDesc
    ];

    if ($deptName === '') {
        $_SESSION['errors']['department_name'] = 'Department name is required.';
    }

    if (!empty($_SESSION['errors'])) {

        header('Location: ../add-department.php');
        exit;
    }


    $stmt = $conn->prepare("INSERT INTO departments (department_name, description) VALUES (?, ?)");
    if ($stmt->execute([$deptName, $deptDesc])) {

        unset($_SESSION['old']);
        $_SESSION['success'] = "Department added successfully!";
        header('Location: ../departments.php');
        exit;
    } else {
        $_SESSION['errors']['general'] = "Failed to add department. Please try again.";
        header('Location: ../add-department.php');
        exit;
    }
} else {
    header('Location: ../add-department.php');
    exit;
}
