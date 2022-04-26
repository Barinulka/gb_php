<? include_once 'functions/goods.php'; ?>
<? $goods = getAllGoods($connect); ?>
<h1>Каталог</h1>
<div class="row">
    <div class="col-12 flex-box ">
        <? foreach ($goods as $val) : ?>
            <div class="card" >
                <img src="../public/images/<?= $val['image']; ?>" class="card-img-top" alt="image">
                <div class="card-body">
                    <h5 class="card-title"><?= $val['name']; ?></h5>
                    <p class="card-text"><?= $val['short'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Цена: <?= numberFormatter($val['price']); ?></li>
                </ul>
                <div class="card-body fb">
                    <a href="public/product.php?id=<?=$val['id']; ?>" class="card-link">Подробнее</a>
                    <a href="#" class="card-link">Купить</a>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>