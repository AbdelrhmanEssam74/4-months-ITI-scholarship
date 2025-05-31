<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Controllers\Employees;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $employeeController = new Employees();
    $r = $employeeController->delete($id);
} else {
    $_SESSION['not-fount'] = "No employee ID provided";
}
header("Location: ../../employees.php");