
<?php if (!isset($_SESSION['id_user'])): ?>

<!--<form action="" method="post">-->
    <div id="header__loginWrapper">
        <input type="text" class="header__inputLogin" id="header__inputLogin" value="user" name="login">
        <input type="password" class="header__inputLogin" id="header__inputPassword" value="qwerty" name="pass">
<!--        <button type="submit" class="header__buttonLogin" name="submit">Вход</button>-->
        <button onclick="loginButton()">Вход АЯКС</button>
        <a href="/register/">Регистрация</a>
    </div>
<!--</form>-->

<? else:?>

<form action="/" method="post">
    <div id="header__logedWrapper">
        <p class="header__userName">вы вошли как: <?=$_SESSION['login']?></p>
        <button type="submit" class="header__buttonLogin" name="exit">Выход</button>
    </div>
</form>

<? endif;?>

