<!doctype html>
<html lang="ru">
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

$i = 0;

while ($i <= 100) {
    if (!($i % 3)) {
        echo $i . '/3 = ' . ($i % 3) . '</br>';
    }
    $i++;
}

/**
 * Задание 2
 */

$j = 0;

do {

    if ($j == 0) {
        echo ($j) . ' - это ноль' . '</br>';
    } elseif (!($j % 2)) {
        echo ($j) . ' - это четное число' . '</br>';
    } else {
        echo ($j) . ' - это не четное число' . '</br>';
    }

    $j++;

} while ($j <= 10);


/**
 * Задание 3
 */

$a = array(
    "Московская область" => array(
        "Зеленоград",
        "Клин",
    ),
    "Ленинградская область" => array(
        "Санкт-Петербург",
        "Павловск",
        "Кронштадт",
        "Всеволожск",
    ),
);

$arrayExplode = [];
$i = 0;

foreach ($a as $key => $value) {
    foreach ($value as $value) {

        $text = $key . ' : ' . $value;
        echo $text . '</br>';

        $arrayExplode[$i] = $text;
        $i++;
    }
}


function transaleString($string)
{
    $translate = array(
        "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "e" => "e", "ж" => "zh", "з" => "z", "и" => "i",
        "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t",
        "у" => "u", "ф" => "f", "х" => "h", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sch", "э" => "e",
        "ю" => "yu", "я" => "ya",  "ы" => "yi");

    $strArray = [];
    $str = '';
    $strArray = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);;
    for ($index = 0; $index < count($strArray); $index++) {
        if ($translate[$strArray[$index]] == '') {
            $str = $str.$strArray[$index];
        } else {
            $str = $str.$translate[$strArray[$index]];
        }
    }
    return $str;
}

echo transaleString('делаю допашку по пхп').'</br>';


/** Задание 5 замена пробела на подчеркивание
 * @param $string
 * @return string
 */

function spaceChange($string)
{
    $str = '';
    $strArray = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);;
    for ($index = 0; $index < count($strArray); $index++) {


        if ($strArray[$index] == ' ') {
            $str = $str.'_';
        } else {
            $str = $str.$strArray[$index];
        }
    }
    return $str;
}

echo spaceChange('делаю допашку по пхп').'</br>';


/**
 * Задание 6 меню
 */


$menuArray = ['Главная', 'Товары', 'Адрес', 'Главная'];

function menuRender($menu) {

    $str = '<ul>';

    for ($index=0; $index< count($menu); $index++) {

        $str = $str.'<li><a href="#">'.$menu[$index].'</a></li>';
    }

    return $str = $str.'</ul>';
}

echo  menuRender($menuArray);


?>




</body>
</html>

