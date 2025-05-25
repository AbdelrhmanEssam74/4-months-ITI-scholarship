<?php
session_start();

// DB connection
require_once '../db/db_connection.php';

$errors = [];

function clean($value) {
    return htmlspecialchars(trim($value));
}

// Get cleaned form values
$first_name = clean($_POST['firstName'] ?? '');
$last_name  = clean($_POST['lastName'] ?? '');
$email      = clean($_POST['email'] ?? '');
$phone      = clean($_POST['phone'] ?? '');
$dob        = $_POST['dob'] ?? '';
$gender     = $_POST['gender'] ?? '';
$department = clean($_POST['department'] ?? '');
$position   = clean($_POST['position'] ?? '');
$hireDate   = clean($_POST['hireDate'] ?? '');
$salary     = clean($_POST['salary'] ?? '');
$address    = clean($_POST['streetAddress'] ?? '');
$city       = clean($_POST['city'] ?? '');
$country    = clean($_POST['country'] ?? '');
$profilePhoto = null; // default

// Basic Validation
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
if (empty($department)) $errors['department'] = "Department is required.";
if (empty($position)) $errors['position'] = "Position is required.";
if (empty($hireDate)) $errors['hireDate'] = "Hire date is required.";
elseif (!strtotime($hireDate)) $errors['hireDate'] = "Invalid hire date.";
if (empty($salary)) $errors['salary'] = "Salary is required.";
elseif (!is_numeric($salary) || $salary < 0) $errors['salary'] = "Salary must be a positive number.";
if (empty($address)) $errors['streetAddress'] = "Address is required.";
if (empty($city)) $errors['city'] = "City is required.";
if (empty($country)) $errors['country'] = "Country is required.";

// Handle file upload
if (!empty($_FILES['profilePhoto']['name']) && $_FILES['profilePhoto']['error'] == 0) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($_FILES['profilePhoto']['type'], $allowedTypes)) {
        $errors['profilePhoto'] = "Profile photo must be JPG or PNG.";
    } else {
        $uploadDir = '../assets/uploads/';
        $fileName = uniqid() . '_' . basename($_FILES['profilePhoto']['name']);
        $targetFile = $uploadDir . $fileName;

        if (!move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $targetFile)) {
            $errors['profilePhoto'] = "Failed to upload photo.";
        } else {
            $profilePhoto = $fileName;
        }
    }
}

// Redirect if errors
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: ../add-employee.php");
    exit;
}

try {
    $stmt = $conn->prepare("
        INSERT INTO employees 
    (first_name, last_name, email, phone, date_of_birth, hire_date, gender, address, city, country, department_id, salary, position, profile_picture) 
        VALUES 
        (:first_name, :last_name, :email, :phone, :dob, :hire_date, :gender, :address, :city, :country, :department, :salary, :position,  :profile_picture)
    ");

    $r = $stmt->execute([
        ':first_name'      => $first_name,
        ':last_name'       => $last_name,
        ':email'           => $email,
        ':phone'           => $phone,
        ':dob'             => $dob ?: null,
        ':gender'          => $gender,
        ':address'         => $address,
        ':city'            => $city,
        ':country'         => $country,
        ':department'      => $department,
        ':salary'          => $salary,
        ':position'        => $position,
        ':hire_date'       => $hireDate,
        ':profile_picture' => $profilePhoto
    ]);

    $_SESSION['success'] = "Employee added successfully.";
    header("Location: ../employees.php");
    exit;

} catch (PDOException $e) {

    $_SESSION['errors']['db'] = "Database error: " . $e->getMessage();
    header("Location: ../add-employee.php");
    exit;
}

