<div class="item_container">
    <? $item = ($content['item_info'][0]); ?>
    <img class="item_container__img" src="/<?= $item['foto'] ?>" alt="картинка">
    <p><?= $item['name'] ?></p>
    <p><?= $item['price'] ?>руб</p>
    <p><?= $item['description'] ?></p>
    <button id_good ='<?=$item['id_good']?>' >купить</button>
</div>

