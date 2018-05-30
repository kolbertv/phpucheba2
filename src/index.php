<?
session_start();

require_once('config.php');
require_once('function.php');
require_once('db.php');
require_once('autorize.php');

$isAuth = auth($_POST['login'], $_POST['pass'], $_POST['rememberme']);


$url_array = explode("/", $_SERVER['REQUEST_URI']);
if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
    $item_id = $url_array[2];
}

$content = prepareVariables($page_name, $item_id);


if (!$_POST['metod'] == 'ajax') {
    require 'base.php';

} else {
//    ob_start(); //запуск буферизации вывода
    require 'auth.php';
//    $str = ob_get_contents(); //Записываем в переменную то, что в буфере
//    ob_end_clean(); //очищаем буфер
//    echo json_encode($str);
}

//echo "<pre>";
//print_r($url_array);
////echo $page_name;
//////
////print_r($content);
//echo "</pre>";


?>

