<?php

namespace Controllers;


use Interfaces\Crud;
use Database\Database;
use PDO;

class Employees implements Crud
{
    private $conn;

    public function __construct()
    {

        $this->conn = new Database();
        $this->conn = $this->conn->getConnection();

    }

    public function create($data)
    {
        function clean($value)
        {
            return htmlspecialchars(trim($value));
        }

        $errors = [];

        // Extract and clean input data
        $first_name = clean($data['firstName'] ?? '');
        $last_name = clean($data['lastName'] ?? '');
        $email = clean($data['email'] ?? '');
        $phone = clean($data['phone'] ?? '');
        $dob = $data['dob'] ?? '';
        $gender = $data['gender'] ?? '';
        $department = clean($data['department'] ?? '');
        $position = clean($data['position'] ?? '');
        $hireDate = clean($data['hireDate'] ?? '');
        $salary = clean($data['salary'] ?? '');
        $address = clean($data['streetAddress'] ?? '');
        $city = clean($data['city'] ?? '');
        $country = clean($data['country'] ?? '');
        $profilePhoto = null;

        // Validation
        if (empty($first_name)) $errors['firstName'] = "First name is required.";
        if (empty($last_name)) $errors['lastName'] = "Last name is required.";
        if (strlen($first_name) < 4) $errors['firstName'] = "First name must be at least 4 characters.";
        if (strlen($last_name) < 4) $errors['lastName'] = "Last name must be at least 4 characters.";

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
        if (!empty($dob) && !strtotime($dob)) {
            $errors['dob'] = "Invalid date of birth.";
        } elseif (strtotime($dob) > strtotime('now')) {
            $errors['dob'] = "Date of birth cannot be in the future.";
        }

        // Profile Photo Upload
        if (!empty($_FILES['profilePhoto']['name']) && $_FILES['profilePhoto']['error'] == 0) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!in_array($_FILES['profilePhoto']['type'], $allowedTypes)) {
                $errors['profilePhoto'] = "Profile photo must be JPG or PNG.";
            } else {
                $uploadDir = '../../assets/uploads/';
                $fileName = uniqid() . '_' . basename($_FILES['profilePhoto']['name']);
                $targetFile = $uploadDir . $fileName;

                if (!move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $targetFile)) {
                    $errors['profilePhoto'] = "Failed to upload photo.";
                } else {
                    $profilePhoto = $fileName;
                }
            }
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            return false;
        }

        try {
            $stmt = $this->conn->prepare("
            INSERT INTO employees 
            (first_name, last_name, email, phone, date_of_birth, hire_date, gender, address, city, country, department_id, salary, position, profile_picture)
            VALUES 
            (:first_name, :last_name, :email, :phone, :dob, :hire_date, :gender, :address, :city, :country, :department, :salary, :position, :profile_picture)
        ");

            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':phone' => $phone,
                ':dob' => $dob ?: null,
                ':gender' => $gender,
                ':address' => $address,
                ':city' => $city,
                ':country' => $country,
                ':department' => $department,
                ':salary' => $salary,
                ':position' => $position,
                ':hire_date' => $hireDate,
                ':profile_picture' => $profilePhoto
            ]);

            $_SESSION['success'] = "Employee added successfully.";
            return true;

        } catch (PDOException $e) {
            $_SESSION['errors']['db'] = "Database error: " . $e->getMessage();
            return false;
        }
    }


    public function read($id = null)
    {
        $data = [];
        if ($id) {

        } else {
            $stmt = $this->conn->prepare("
                SELECT e.*, d.department_name 
                FROM employees e
                JOIN departments d ON e.department_id = d.department_id
                ");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;

    }

    public function update($data)
    {
        $errors = [];

        // Extract form data
        $employee_id   = $data['employee_id'] ?? '';
        $first_name    = trim($data['first_name'] ?? '');
        $last_name     = trim($data['last_name'] ?? '');
        $email         = trim($data['email'] ?? '');
        $phone         = trim($data['phone'] ?? '');
        $dob           = $data['date_of_birth'] ?? '';
        $hire_date     = $data['hire_date'] ?? '';
        $gender        = $data['gender'] ?? '';
        $address       = $data['address'] ?? '';
        $city          = $data['city'] ?? '';
        $country       = $data['country'] ?? '';
        $department_id = $data['department_id'] ?? '';
        $salary        = $data['salary'] ?? '';
        $position      = $data['position'] ?? '';
        $oldImage      = $data['old_image'] ?? '';
        $image         = $_FILES['new_image'] ?? null;

        // Required field validation
        $requiredFields = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'gender' => $gender,
            'position' => $position,
            'salary' => $salary,
            'address' => $address,
            'city' => $city,
            'country' => $country
        ];

        foreach ($requiredFields as $field => $value) {
            if (empty($value)) {
                $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . " is required.";
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

        // Handle image upload
        $uploadDir = 'assets/uploads/';
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

                if (!move_uploaded_file($image['tmp_name'], '../' . $targetFile)) {
                    $errors['profilePhoto'] = "Failed to upload image.";
                } else {
                    if (!empty($oldImage) && file_exists('../' . $oldImage)) {
                        @unlink('../' . $oldImage);
                    }
                    $newFileName = $targetFile;
                }
            }
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $data;
            return false;
        }

        // Prepare SQL update
        try {
            $sql = "UPDATE employees SET
            first_name = ?, last_name = ?, email = ?, phone = ?, date_of_birth = ?, hire_date = ?,
            gender = ?, address = ?, city = ?, country = ?, department_id = ?, salary = ?, position = ?,
            profile_picture = ?
            WHERE employee_id = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $first_name, $last_name, $email, $phone, $dob, $hire_date,
                $gender, $address, $city, $country, $department_id, $salary, $position,
                $newFileName, $employee_id
            ]);

            if ($stmt->rowCount() > 0) {
                $_SESSION['success'] = "Employee updated successfully.";
            } else {
                $_SESSION['danger'] = "No changes made.";
            }

            return true;

        } catch (\PDOException $e) {
            $_SESSION['errors']['db'] = "Database error: " . $e->getMessage();
            return false;
        }
    }


    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM employees WHERE employee_id = :id");
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Employee deleted successfully";
            return true;
        } else {
            $_SESSION['failed'] = "Error deleting employee: ";
            return false;
        }
    }
}