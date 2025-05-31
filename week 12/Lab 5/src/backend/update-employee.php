<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Controllers\Employees;
$employeeController = new Employees();
$r = $employeeController->update($_POST);


if ($r)
{
    header("Location: ../../employees.php");
}else{
    header("Location: ../../employees.php");
}
exit;
