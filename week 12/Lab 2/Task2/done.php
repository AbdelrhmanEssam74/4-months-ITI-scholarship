<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $username =  $_POST['username'];
    $address =  $_POST['address'];
    $skills = $_POST['skills'];
    $department = $_POST['department'];

    if ($gender === 'male'){
        echo "<h1>Welcome, Mr. $first_name  $last_name</h1>";
    }
    else{
        echo "<h1>Welcome, Ms. $first_name  $last_name</h1>";
    }
    echo "<h2>Please Review Your Information:</h2>";
    echo "<p>Name: $first_name $last_name</p>";
    echo "<p>Address: $address</p>";
    echo "<p>Your Skills:</p>";
    echo "<ul>";
    foreach ($skills as $skill) {
        echo "<li>$skill</li>";
    }
    echo "</ul>";
    echo "<p>Department: $department</p>";
}
