<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Домашка 4</title>
</head>
<body>


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

<form method="POST" enctype="multipart/form-data" action="index.php">
    <input type="file" name="myFile">
    <input type="submit" value="Отправить">
</form>

<?php



?>


</body>
</html>






