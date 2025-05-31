<?php

require_once __DIR__ . '/../../vendor/autoload.php';


use Controllers\Department;
$dept = new Department();
$r = $dept->create($_POST);


if ($r) {
    header("Location: ../../departments.php");
    exit;
} else {
    header("Location: ../../add-department.php");
    exit;
}

