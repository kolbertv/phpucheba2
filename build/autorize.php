<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.05.2018
 * Time: 13:24
 */

function auth($login = null, $pass = null, $rememberme = null)
{
    $isAuth = 0;

    if (!empty($login)) {
        $isAuth = authWithCredential($login, $pass, $rememberme);
    } elseif ($_SESSION['idUserSession']) {
        $isAuth = checkAuthWithSession($_SESSION['idUserSession']);

    } else {
        $isAuth = checkAuthWithCookie();
    }

    return $isAuth;
}


function userExit()
{
    //Удаляем данные об авторизации пользователя
    $idUserSession = $_SESSION['idUserSession'];
    $sql = "delete from users_auth where hash_cookie = '$idUserSession'";
    executeQuery($sql);

    //Удаляем все переменные сессии

    unset($_SESSION['id_user']);
    unset($_SESSION['idUserSession']);
    unset($_SESSION['login']);

    //Удаляем все переменные куки
    setcookie('idUserCookie', '', time() - 3600 * 24 * 7);

    return $isAuth = 0;

}

function checkAuthWithCookie()
{
    $isAuth = 0;

    $link = getConnection();
    $idUserCookie = $_COOKIE['$idUserCookie'];
    $hash_cookie = mysqli_real_escape_string($link, $idUserCookie);
    $sql = "select Users.login, users_auth.* from users_auth inner join Users on 
users_auth.id_user = Users.id_user where users_auth.hash_cookie = '$hash_cookie'";


    $user_date = getRowResult($sql, $link);

    if ($user_date) {
        $isAuth = 1;
        $_SESSION['login'] = $user_date['login'];
        $_SESSION['id_user'] = $user_date['id_user'];
        $_SESSION['idUserSession'] = $hash_cookie;

    } else {
        $isAuth = 0;
        userExit();
    }

    return $isAuth;
}


function checkAuthWithSession($idUserSession)
{
    $isAuth = 0;

    $link = getConnection();
    $sql = "select Users.login, users_auth.* from users_auth inner join Users on 
users_auth.id_user = Users.id_user where users_auth.hash_cookie = '$idUserSession'";
    $user_date = getRowResult($sql);
    if ($user_date) {
        $isAuth = 1;
    } else {
        $isAuth = 0;
        userExit();
    }

    return $isAuth;

}


function authWithCredential($username, $password, $rememberme = false)
{
    $isAuth = 0;
    $link = getConnection();
    $login = mysqli_real_escape_string($link, $username);
    $sql = "select * from users where login = '$login'";
    $user_date = getRowResult($sql, $link);

    if ($user_date) {
        $passHash = $user_date['pass'];
        $id_user = $user_date['id_user'];
        $idUserCookie = microtime() . rand(100, 1000000);
        $idUserCookieHash = hash('sha256', $idUserCookie);

        if (password_verify($password, $passHash)) {
            $_SESSION['login'] = $username;
            $_SESSION['id_user'] = $id_user;
            $_SESSION['idUserSession'] = $idUserCookieHash;
            $sql = "insert into users_auth (id_user, hash_cookie, date, prim) value ('$id_user', '$idUserCookieHash', now(), '$idUserCookie')";
            executeQuery($sql);

            $isAuth = 1;

            if ($rememberme == true) {
                setcookie('idUserCookie', $idUserCookieHash, time() * 3600 * 24 * 7, '/');
            }
        } else {
            userExit();
        }


    } else {
        userExit();
    }


    return $isAuth;
}


?>