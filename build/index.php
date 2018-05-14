<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP учеба</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.05.2018
 * Time: 10:11
 */
echo 'PHP учеба </br>';

/**
 * Задание 1
 */

$a = 0;
$b = 0;

if ($a >= 0 and $b >= 0) {
    echo "числа положительные  </br>";
} elseif ($a < 0 and $b < 0) {
    echo "числа отрицательные  </br>";
} elseif (($a < 0 and $b >= 0) or ($a >= 0 and $b < 0)) {
    $c = $a + $b;
    echo "сумма чисел с разными знаками: $c </br>";
}

/**
 * Задание 2, упростил, чтобы много кейсов не писать. :)
 */

$a = rand(0, 15);
switch ($a) {
    case $a:
        echo "$a </br>";
        break;
}

/**
 * Задание 3
 */

function plus($a, $b)
{
    return $a + $b;
}

echo plus(2, 2);
echo "</br>";

function minus($a, $b)
{
    return $a - $b;
}

echo minus(5, 4);
echo "</br>";

function multiply($a, $b)
{
    return $a * $b;
}

echo multiply(1, 2);
echo "</br>";

function devide($a, $b)
{
    return $a / $b;
}

echo devide(1, 2);
echo "</br>";

/**
 * Задание 4
 */

function operation($a, $b, $name)
{
    switch ($name) {
        case 'plus':
            return plus($a, $b);
        case 'minus':
            return minus($a, $b);
        case 'multiply':
            return multiply($a, $b);
        case 'devide':
            return devide($a, $b);
    }

    return 'Такой функции нет';
}

;

echo operation(1, 2, 'devide');
echo "</br>";

/**
 * Задание 5, сделал просто, в футер вставлять не стал.
 */

echo date('l jS \of F Y h:i:s A');
echo "</br>";

/**
 * Задание 6
 * @param $val
 * @param $power
 * @return float|int
 */

function power($val, $pow)
{
    if ($pow) {
        return $val * power($val, $pow - 1);
    }
    return 1;
}

echo power(2, 5);
echo "</br>";


/**
 * Задание 7
 */

function coolTime()
{
    $hour = date("h");
    $minut = date("i");
    $foolTime = '';

    if ($hour ==1 or $hour ==21) {
        $foolTime = $hour . 'час ';
    } elseif (($hour >1 and $hour < 5) or ($hour >21 and $hour <= 24)) {
        $foolTime = $hour . 'часа ';
    } else {
        $foolTime = $hour . ' часов ';
    }

    if ($minut ==1 or $minut ==21 or $minut ==31 or $minut ==41) {
        $foolTime = $foolTime . $minut . ' минута';
    } elseif (($minut >1 and $minut <5) or ($minut >21 and $minut <25) or ($minut >31 and $minut <35) or ($minut >41 and $minut <45)) {
        $foolTime = $foolTime . $minut . ' минуты';
    } else {
        $foolTime = $foolTime . $minut . ' минут';
    }

    return $foolTime;
}

echo coolTime();

?>

</body>
</html>