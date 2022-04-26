<? 
    include '../functions/utls.php'; 
    include_once '../functions/goods.php';

    $good = array();

    if ($_GET['id']) {
        $good = getGoodByID($connect, $_GET['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Мой магазин</title>
</head>
<body>

    <? include '../templates/_header.php'; ?>

    <div class="content-block">
        <div class="container ">
            <? if (!empty($good)) : ?>
                <h3><?= $good['name']; ?></h3>
                <div class="card" style="width: 35rem;" >
                    <img src="images/<?= $good['image']; ?>" class="card-img-top" alt="image">
                    <div class="card-body">
                        <p class="card-text"><?= $good['descr'] ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Цена: <?= numberFormatter($good['price']); ?></li>
                        <li class="list-group-item">Добавлен: <?=date("d.m.y", $good['data']);?></li>
                    </ul>
                    <div class="card-body fb">
                        <a href="#" class="card-link">Купить</a>
                    </div>
                </div>
            <? endif; ?>
        </div>
    </div>

    <? include '../templates/_load-scripts.php'; ?>
</body>
</html>
