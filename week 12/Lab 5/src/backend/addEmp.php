<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Controllers\Employees;
$employeeController = new Employees();
$r = $employeeController->create($_POST);


if ($r)
{
    header("Location: ../../employees.php");
    exit;
}else{
    header("Location: ../../add-employee.php");
    exit;
}
