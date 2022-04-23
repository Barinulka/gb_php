<? include_once 'functions/goods.php'; ?>
<? $goods = getAllGoods($connect); ?>
<h1>Каталог</h1>
<div class="row">
    <? foreach ($goods as $val) : ?>
        <div class="card col-12 col-xs-12 col-sm-6 col-md-4" >
            <img src="public/images/<?= $val['image']; ?>" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title"><?= $val['name']; ?></h5>
                <p class="card-text"><?= $val['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Цена: <?= numberFormatter($val['price']); ?></li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Подробнее</a>
            </div>
        </div>
    <? endforeach; ?>
</div>