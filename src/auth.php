<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 31.05.2018
 * Time: 1:23
 */

$str_json = file_get_contents('php://input');
$response = json_decode($str_json, true);

print_r($response);

?>