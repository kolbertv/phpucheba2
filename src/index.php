<?
session_start();

require_once('config.php');
require_once('function.php');
require_once('db.php');
require_once('autorize.php');



$rawData = file_get_contents("php://input");

if (isset($rawData)) {
    $jsonDecode = json_decode($rawData);
    $postLogin = $jsonDecode->{'login'};
    $postPass = $jsonDecode->{'pass'};
    $rememberme = $jsonDecode->{'rememberme'};
    $isAuth = auth($postLogin, $postPass, $rememberme);
}




if (isset($_POST['exit'])) {
    userExit();
}

//print_r($jsonDecode->{'metod'});

////echo $jsonDecode[1];
//echo $isAuth;
////print_r ($isAuth);
//print_r($_SESSION);
//print_r($_POST);


$url_array = explode("/", $_SERVER['REQUEST_URI']);
if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
    $item_id = $url_array[2];
}

$content = prepareVariables($page_name, $item_id);
//require 'base.php';


$jsonMetod = $jsonDecode->{'metod'};

if (!$jsonMetod == 'ajax') {
    require 'base.php';

} else {

    ob_start();
    require 'auth.php';
    $str = ob_get_contents();
    ob_end_clean();
//    echo json_encode($str);
    echo ($str);
}

?>

