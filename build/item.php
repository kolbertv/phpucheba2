<div class="card_container">
    <? foreach ($content['catalog_product'] as $item): ?>
        <div class="card_container__item">
            <a href="good/<?= $item['id_good'] ?>">
                <img class="card_container__img" src="/<?= $item['foto'] ?>" alt="">
                <p><?= $item['name'] ?></p>
                <p><?= $item['price'] ?>руб</p>
            </a>
        </div>
    <? endforeach; ?>
</div>