<?php
include '../db/db_connection.php';
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = $_POST['date_of_birth'];
    $hire_date = $_POST['hire_date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $department_id = $_POST['department_id'];
    $salary = $_POST['salary'];
    $position = $_POST['position'];

    if (empty($first_name)) $errors['firstName'] = "First name is required.";
    if (empty($last_name)) $errors['lastName'] = "Last name is required.";

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (!empty($phone) && !preg_match('/^[0-9\-\+\s\(\)]+$/', $phone)) {
        $errors['phone'] = "Phone number is invalid.";
    }

    if (empty($gender)) $errors['gender'] = "Please select a valid gender.";
    if (empty($position)) $errors['position'] = "Position is required.";
    if (empty($salary)) $errors['salary'] = "Salary is required.";
    elseif (!is_numeric($salary) || $salary < 0) $errors['salary'] = "Salary must be a positive number.";
    if (empty($address)) $errors['streetAddress'] = "Address is required.";
    if (empty($city)) $errors['city'] = "City is required.";
    if (empty($country)) $errors['country'] = "Country is required.";
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../edit-employee.php?id=" . $employee_id);
        exit;
    }
    $sql = "UPDATE employees SET
        first_name = ?, last_name = ?, email = ?, phone = ?, date_of_birth = ?, hire_date = ?,
        gender = ?, address = ?, city = ?, country = ?, department_id = ?, salary = ?, position = ?
        WHERE employee_id = ?";

    $stmt = $conn->prepare($sql);
    $r = $stmt->execute([
        $first_name, $last_name, $email, $phone, $dob, $hire_date,
        $gender, $address, $city, $country, $department_id, $salary, $position,
        $employee_id
    ]);
    if($stmt->rowCount() > 0) {
        $_SESSION['success'] = "Employee updated successfully.";
    } else {
        $_SESSION['danger'] = "No changes made .";
    }
    header("Location: ../employees.php");
    exit;
} else {
    header("Location: employees.php");
    exit;
}
