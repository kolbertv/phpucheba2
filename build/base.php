<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><? echo $content['title']?></title>
    <link rel="stylesheet" href="/css/main6.css">
    <script src="/js/index.js"></script>
</head>
<body>

<header class="header">

<div class="header__logo"></div>
<div class="header__menu"></div>
<div class="header__auth">


    <? include 'auth.php'?>
    
    
    

</div>

</header>

<main class="main">

    <?php include $content['content']; ?>

</main>





</body>
</html>