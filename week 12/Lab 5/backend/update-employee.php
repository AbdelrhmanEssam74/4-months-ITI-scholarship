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
    $oldImage = $_POST['old_image'] ?? '';
    $image = $_FILES['new_image'] ?? null;
    $requiredFields = [
        'first_name' => 'First name',
        'last_name' => 'Last name',
        'email' => 'Email',
        'gender' => 'Gender',
        'position' => 'Position',
        'salary' => 'Salary',
        'address' => 'Address',
        'city' => 'City',
        'country' => 'Country',
    ];

    foreach ($requiredFields as $field => $label) {
        if (empty($$field)) {
            $errors[$field] = "$label is required.";
        }
    }


    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (!empty($phone) && !preg_match('/^[0-9\-\+\s\(\)]+$/', $phone)) {
        $errors['phone'] = "Phone number is invalid.";
    }

    if (!empty($salary) && (!is_numeric($salary) || $salary < 0)) {
        $errors['salary'] = "Salary must be a positive number.";
    }


    $uploadDir = "assets/uploads/";
    $newFileName = $oldImage;

    if ($image && $image['error'] === 0) {

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileMimeType = strtolower($image['type']);

        if (!in_array($fileMimeType, $allowedTypes)) {
            $errors['profilePhoto'] = "Invalid image type. Only JPG, PNG, and JPEG are allowed.";
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $safeFilename = uniqid('img_', true) . '.' . $ext;
            $targetFile = $uploadDir . $safeFilename;

            if (!move_uploaded_file($image['tmp_name'], "../" . $targetFile)) {
                $errors['profilePhoto'] = "Failed to upload image.";
            } else {

                if (!empty($oldImage) && strpos($oldImage, 'assets/uploads/') === 0 && file_exists("../" . $oldImage)) {
                    @unlink("../" . $oldImage);
                }
                $newFileName = $targetFile;
            }
        }
    } elseif (empty($oldImage)) {
        $errors['image'] = "Image is required.";

    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = $_POST;
        header("Location: ../edit-employee.php?id=" . urlencode($employee_id));
        exit;
    }

    // Prepare SQL update
    $sql = "UPDATE employees SET
        first_name = ?, last_name = ?, email = ?, phone = ?, date_of_birth = ?, hire_date = ?,
        gender = ?, address = ?, city = ?, country = ?, department_id = ?, salary = ?, position = ?,
        profile_picture = ?
        WHERE employee_id = ?";

    $stmt = $conn->prepare($sql);
    $success = $stmt->execute([
        $first_name, $last_name, $email, $phone, $dob, $hire_date,
        $gender, $address, $city, $country, $department_id, $salary, $position,
        $newFileName, $employee_id
    ]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['success'] = "Employee updated successfully.";
    } else {
        $_SESSION['danger'] = "No changes made.";
    }

    header("Location: ../employees.php");
    exit;
}
else {
    header("Location: ../employees.php");
    exit;
}
