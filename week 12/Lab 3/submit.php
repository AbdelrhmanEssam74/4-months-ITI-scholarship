<?php
session_start();

function sanitize($data): string
{
    return htmlspecialchars(trim($data));
}

function validateImage($type): bool
{
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    return in_array($type, $allowedTypes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize Inputs
    $first_name = sanitize($_POST['first_name'] ?? '');
    $last_name = sanitize($_POST['last_name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $country = sanitize($_POST['country'] ?? '');
    $gender = sanitize($_POST['gender'] ?? '');
    $skills = $_POST['skills'] ?? [];
    $username = sanitize($_POST['username'] ?? '');
    $department = sanitize($_POST['department'] ?? '');
    $password = $_POST['password'] ?? '';
    $captcha = sanitize($_POST['captcha'] ?? '');
    $images = $_FILES['images'];

    $errors = [];

    if (empty($first_name) || strlen($first_name) < 4) {
        $errors['first_name'] = "First name must be at least 4 characters and not numbers only.";
    }
    if (!preg_match("/[a-zA-Z]/", $first_name)) {
        $errors['first_name'] = "First name must contain at least one letter.";
    }


    if (empty($last_name) || strlen($last_name) < 4 || ctype_digit($last_name)) {
        $errors['last_name'] = "Last name must be at least 4 characters and not numbers only.";
    }
    if (!preg_match("/[a-zA-Z]/", $last_name)) {
        $errors['last_name'] = "Last name must contain at least one letter.";
    }


    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }


    if (empty($country)) {
        $errors['country'] = "Country is required.";
    }


    if (empty($gender) || !in_array($gender, ['male', 'female'])) {
        $errors['gender'] = "Please select your gender.";
    }


    if (empty($skills) || !is_array($skills)) {
        $errors['skills'] = "Please select at least one skill.";
    }


    if (empty($username) || strlen($username) < 4) {
        $errors['username'] = "Username must be at least 4 characters.";
    }


    if (empty($department)) {
        $errors['department'] = "Department is required.";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }


    if (empty($captcha) || strtolower($captcha) !== 'sh68so') {
        $errors['captcha'] = "Invalid CAPTCHA code.";
    }


    if (empty($images['name'][0])) {
        $errors['images'] = "At least one image is required.";
    } else {
        foreach ($images['name'] as $key => $name) {
            if (!validateImage($images['type'][$key])) {
                $errors['images'] = "Only JPG, PNG under 2MB are allowed.";
                break;
            }
        }
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }


    foreach ($images['name'] as $key => $name) {
        $targetPath = 'uploads/' . basename($name);
        move_uploaded_file($images['tmp_name'][$key], $targetPath);
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    echo "<h3>Form submitted successfully!</h3>";
    echo "First Name: $first_name<br>";
    echo "Last Name: $last_name<br>";
    echo "Email: $email<br>";
    echo "Country: $country<br>";
    echo "Gender: $gender<br>";
    echo "Username: $username<br>";
    echo "Department: $department<br>";
    echo "Skills: " . implode(", ", $skills) . "<br>";
    echo "Password Hash: $hashed_password<br>";
}
