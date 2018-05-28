<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main6.css">
</head>
<body>


<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.05.2018
 * Time: 10:40
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $result = 0;
    $fDigit = $_POST['fDigit'];
    $sDigit = $_POST['sDigit'];

    switch ($_POST['button']) {

        case 'plus':
            $result = $fDigit + $sDigit;
            break;

        case 'minus':
            $result = $fDigit - $sDigit;
            break;

        case 'multiply':
            $result = $fDigit * $sDigit;
            break;

        case 'devide':
            if ($sDigit == 0) {
                $result = 'Деление на ноль';
            } else {
                $result = $fDigit / $sDigit;
            }
            break;
    }
}

?>


<form method="POST" enctype="multipart/form-data" action="index.php">
    <div class="form_container">
        <input type="number" name="fDigit" value="<?  if ($fDigit == 0) {
            echo 0;
        } else {
            echo $fDigit;
        } ?>"></br>
        <input type="number" name="sDigit" value="<?  if ($sDigit == 0) {
            echo 0;
        } else {
            echo $sDigit;
        } ?>"></br>
        <input type="text" name="result" value="<? echo $result ?>"></br>
        <button type="submit" name="button" value="plus">СЛОЖИТЬ</button>
        </br>
        <button type="submit" name="button" value="minus">Вычесть</button>
        </br>
        <button type="submit" name="button" value="multiply">Умнжить</button>
        </br>
        <button type="submit" name="button" value="devide">Поделить</button>
        </br>

    </div>

</form>


</body>
</html>