<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.05.2018
 * Time: 15:43
 */



function prepareVariables($page_name = "index")
{
    $url_array = explode("/", $_SERVER['REQUEST_URI']);
    switch ($page_name) {

        case "index":
            $vars['content'] = 'item.php';
            $vars['title'] = SITE_TITLE . " - Главная страница";
            $vars['catalog_product'] = catalogProduct();

            break;

        case "good":

            $vars['content'] = 'itempage.php';
            $vars['item_info'] = itemInfo($url_array[2]);
            $vars['title'] = SITE_TITLE . " - Информация о товаре".$vars['item_info'];


            break;

    }
    return $vars;
}

function catalogProduct()
{

    $sql = 'select * from goods order by date desc limit 4';
    return getAssocResult($sql);

}

function itemInfo($id) {

    $sql = 'select * from goods where id_good='.$id;
    return getAssocResult($sql);

}


?>