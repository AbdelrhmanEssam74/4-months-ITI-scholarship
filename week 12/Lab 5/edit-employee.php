<?php

include 'includes/header.php';
require_once  'vendor/autoload.php';
use Controllers\Employees;
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert mt-5 alert-danger'>Invalid employee ID.</div>";
    exit;
}

$employee_id = (int)$_GET['id'];

use Controllers\Department;
$dpt = new Department();
$departments = $dpt->read();

$employees = new Employees();
$employee = $employees->read();
foreach ($employee as $emp) {
    if ($emp['employee_id'] == $employee_id) {
        $employee = $emp;
        break;
    }
}
if (!$employee) {
    die("Employee not found.");
}
?>

<div class="container-fluid pt-5">
    <h1 class="mb-4">Edit Employee</h1>
    <form action="src/backend/update-employee.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="employee_id" value="<?= $employee['employee_id'] ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($employee['first_name']) ?>"  >
                <span class="text-danger"><?= $errors['firstName'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($employee['last_name']) ?>"  >
                <span class="text-danger"><?= $errors['last_name'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($employee['email']) ?>"  >
                <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($employee['phone']) ?>">
                <span class="text-danger"><?= $errors['phone'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" value="<?= htmlspecialchars($employee['date_of_birth']) ?>">
                <span class="text-danger"><?= $errors['date_of_birth'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Hire Date</label>
                <input type="date" name="hire_date" class="form-control" value="<?= htmlspecialchars($employee['hire_date']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="Male" <?= $employee['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $employee['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
                <span class="text-danger"><?= $errors['gender'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Department</label>
                <select name="department_id" class="form-control"  >
                    <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['department_id'] ?>" <?= $employee['department_id'] == $dept['department_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($dept['department_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control" value="<?= $employee['salary'] ?>">
                <span class="text-danger"><?= $errors['salary'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Position</label>
                <input type="text" name="position" class="form-control" value="<?= htmlspecialchars($employee['position']) ?>">
                <span class="text-danger"><?= $errors['position'] ?? '' ?></span>
            </div>
            <div class="col-12">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($employee['address']) ?>">
                <span class="text-danger"><?= $errors['streetAddress'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($employee['city']) ?>">
                <span class="text-danger"><?= $errors['city'] ?? '' ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($employee['country']) ?>">
                <span class="text-danger"><?= $errors['country'] ?? '' ?></span>
            </div>
            <div class="col-md-12">
                <label for="profilePhoto" class="form-label">Update Profile Photo</label>
                <input type="hidden" name="old_image" value="<?= htmlspecialchars($employee['profile_picture']) ?>">
                <input class="form-control" type="file" id="profilePhoto" name="new_image" accept="image/*">
                <span class="text-danger"><?= $errors['profilePhoto'] ?? '' ?></span>
            </div>
        </div>

        <div class="mt-4">
            <a href="employees.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
