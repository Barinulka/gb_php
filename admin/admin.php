<? 
    include '../functions/utls.php';
    include_once '../functions/goods.php';
    $goods = getAllGoods($connect); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Админка</title>
</head>
<body>

    <? include '../templates/_header.php'; ?>

    <div class="content-block">
        <div class="container">
            <h2>Admin</h2>
            <h5>Спиок товаров</h5>
            <? if (isset($_SESSION['message']) && $_SESSION['message']) : ?>
                <? print_r('<b>%s</b>', $_SESSION['message']) ?>
                <?unset($_SESSION['message']);?>
            <? endif; ?>
            <div class="row">
                <div class="col-12 flex-box admin">
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
                                <a href="edit.php?id=<?=$val['id']; ?>" class="card-link">Редактировать</a>
                                <a href="delete.php?id=<?=$val['id']; ?>" class="card-link">Удалить</a>
                            </div>
                            
                        </div>
                    <? endforeach; ?>
                    <div class="card" >
                        <div class="card-body">
                            <a href="edit.php" class="card-link">Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <? include '../templates/_load-scripts.php'; ?>
</body>
</html>
