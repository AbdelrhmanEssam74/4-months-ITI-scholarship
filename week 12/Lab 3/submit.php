<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $username =  $_POST['username'];
    $address =  $_POST['address'];
    $skills = $_POST['skills'];
    $department = $_POST['department'];
    $password = $_POST['password'];
}
