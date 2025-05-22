<?php
$students = [
    ["name" => "ali", "age" => 22, "email" => "ali@gmail.com", "image" => "img1.jpeg", "skills" => ["php", "js"]],
    ["name" => "mona", "age" => 20, "email" => "mona@gmail.com", "image" => "img2.jpeg", "skills" => ["css", "js"]],
    ["name" => "sara", "age" => 25, "email" => "sara@gmail.com", "image" => "img3.jpeg", "skills" => ["php", "html"]],
    ["name" => "ahmed", "age" => 22, "email" => "ahmed@gmail.com", "image" => "img3.png", "skills" => ["html", "css"]]
];
//? point 1
echo "<h2>Point 1</h2>";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>table</title>
        <link rel="stylesheet" href="style.css">
    <body>
    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Image</th>
            <th>Skills</th>
        </tr>
        <?php
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['name'] . "</td>";
            echo "<td>" . $student['age'] . "</td>";
            echo "<td>" . $student['email'] . "</td>";
            echo "<td><img src='images/" . $student['image'] . "' alt='" . $student['name'] . "' width='50' height='50'></td>";
            echo "<td>";
            echo '<ul>';
            foreach ($student['skills'] as $skill) {
                echo "<li class='skill'>" . $skill . "</li>";
            }
            echo '</ul>';
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </body>
    </html>

<?php

//? point 2
echo "<h2>Point 2</h2>";
$array1 = [5, 2, 9, 1, 5, 6];
$array2 = ["b", "a", "o", "k"];

sort($array1);
sort($array2);
echo "<pre>";
print_r($array1);
print_r($array2);
echo "</pre>";
rsort($array1);
rsort($array2);
echo "<pre>";
print_r($array1);
print_r($array2);
echo "</pre>";
ksort($array1);
ksort($array2);
echo "<pre>";
print_r($array1);
print_r($array2);
echo "</pre>";

//? point 3
echo "<h2>Point 3</h2>";
$array_key = array_keys($student);
echo "<pre>";
print_r($array_key);
echo "</pre>";