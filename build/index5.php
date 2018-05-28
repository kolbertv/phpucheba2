<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once ('config.php');
require_once ('function.php');



?>

<form action="#" method="post">
    <input type="submit" name="img1" value="Загрузить картинку 1">
    <input type="submit" name="img2" value="Загрузить картинку 2">
    <input type="submit" name="img3" value="Загрузить картинку 3">
    <input type="submit" name="img4" value="Загрузить картинку 4">
<!--    <input type="submit" name="img" value="Загрузить картинки из БД2">-->
</form>

<?php

echo '<pre>';
    print_r($_POST);
echo '</pre>';


?>


<div class="img_wrapper">

    <?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 21.05.2018
     * Time: 15:43
     */

    
    

    $arrayImg = array('product1.jpg', 'product2.jpg', 'product3.jpg', 'product4.jpg',);

    function showImg($listImg)
    {
        $str = '';

        for ($i = 0; $i < count($listImg); $i++) {

            $str = $str . '<div class="img_item"><a href="img/' . $listImg[$i] . '"><img src="img/' . $listImg[$i] . '" alt=""></a></div>';

        }
        return $str;
    }

    echo showImg($arrayImg);
    ?>

</div>



</body>
</html>