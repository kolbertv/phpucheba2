<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.05.2018
 * Time: 15:43
 */



function prepareVariables($page_name = "index", $item_id = 0)
{
    switch ($page_name) {
        case "index":
            $vars['content'] = 'item.php';
            $vars['title'] = SITE_TITLE . " - Главная страница";
            $vars['catalog_product'] = catalogProduct();
            break;

        case "good":
            $vars['content'] = 'itempage.php';
            $vars['item_info'] = itemInfo($item_id);
            $vars['title'] = SITE_TITLE . " - Информация о товаре";
            break;

        case "register":
            $vars['content'] = 'register.php';
            $vars['title'] = SITE_TITLE . " - Регистрация пользователя";
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