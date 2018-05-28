<?
require_once('config.php');

require_once('function.php');
require_once('db.php');


$url_array = explode("/", $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
}

$content = prepareVariables($page_name);


require 'base.php';

//echo "<pre>";
//
//print_r($url_array);
////echo $page_name;
//
//print_r($content);
//
//echo "</pre>";


?>

