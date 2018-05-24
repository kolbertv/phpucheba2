<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.05.2018
 * Time: 15:43
 */

function executeQuery($sql)
{

    $db = mysqli_connect(HOST, USER, PASS, DB);
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function getResult($sql)
{

    $db = mysqli_connect(HOST, USER, PASS, DB);
    $result = mysqli_query($db, $sql);
    $arrayResult = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arrayResult[] = $row;
    }
    mysqli_close($db);
    return $result;


}


?>