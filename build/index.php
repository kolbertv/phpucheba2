<?
session_start();

require_once('config.php');
require_once('function.php');
require_once('db.php');
require_once('autorize.php');



$isAuth = auth($_POST['login'], $_POST['pass'], $_POST['rememberme']);


if (isset($_POST['exit'])) {
    userExit();
}

echo $isAuth;
print_r($_SESSION);
print_r($_POST);


$url_array = explode("/", $_SERVER['REQUEST_URI']);
if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
    $item_id = $url_array[2];
}

$content = prepareVariables($page_name, $item_id);
require 'base.php';

//if (!$response['metod']== 'ajax') {
//    require 'base.php';
//
//} else {
//
//    ob_start();
//    require 'auth.php';
//    $str = ob_get_contents();
//    ob_end_clean();
//    echo json_encode($str);
//}




?>