<?php
echo "Welcome to PHP <br>";

$x = 5;
$y = "welcome";
$z = true;

echo "type of x is " . gettype($x) . "<br>";
echo "type of y is " . gettype($y) . "<br>";
echo "type of z is " . gettype($z) . "<br>";

for ($i = 0; $i <= 15; $i++) {
    echo "$i: ";
}
echo "<br>";
$i = 0;
while ($i < 16) {
    echo "$i: ";
    $i++;
}

define("const1", "ITI");
echo "<br>";
echo const1 . "<br>";

print (gettype($x)) . "<br>";
print (gettype($y)) . "<br>";
print (gettype($z)) . "<br>";

echo "<br>";

$x = "";

echo "isset of x is " . isset($x) . "<br>";
echo "isset of y is " . isset($y) . "<br>";
echo "isset of z is " . isset($z) . "<br>";

echo "empty of x is " . empty($x) . "<br>";
echo "empty of y is " . empty($y) . "<br>";
echo "empty of z is " . empty($z) . "<br>";


$m = 20;
$n = 40;
$result = $m + $n;
if ($result > 50) {
    echo "Accepted";
} else {
    echo "Not accepted";
}


echo "<br>";

echo "
<table border='1'>
    <tr>
        <td> salary of mr.a is</td>
        <td>1000</td>
    </tr>
    <tr>
        <td>salary of mr.b is</td>
        <td>2000</td>
    </tr>
    <tr>
        <td> salary of mr.c is</td>
        <td>3000</td>
    </tr>
</table>
";


$t = 123;
function numberToString($number): string
{
    return (string)$number;
}

echo gettype(numberToString($t)) . "<br>";
