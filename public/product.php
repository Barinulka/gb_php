<? 
    include '../functions/utls.php'; 
    include_once '../functions/goods.php';
    include_once '../functions/comments.php';

    $good = array();

    if ($_GET['id']) {
        $good = getGoodByID($connect, $_GET['id']);
        $reviews = getAllCommets($connect, $_GET['id']);
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

            <div class="reviews">
                <? if (!empty($reviews)) : ?>
                    <h4 style="margin-bottom: 10px;">Отзывы</h4>
                    <div class="rev_block">
                        <? foreach ($reviews as $review) : ?>
                            <div class="rev_elem">
                                <div class="rev_name"><?= $review['name']; ?> <span><?= date("d.m.y", $review['date']); ?></span></div>
                                <div class="rev_text"><?= $review['text']; ?></div>
                            </div>
                        <? endforeach; ?>
                    </div>
                <? endif; ?>
            
                <form class="review-form" method="POST" action="../functions/comments.php">
                    <h5>Оставить отзыв о товаре</h5>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Ваше Имя</label>
                        <input type="text" name="Comment[name]" class="form-control" id="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Ваш E-mail</label>
                        <input type="email" name="Comment[email]" class="form-control" id="inputEmail">
                    </div>
                    <div class="mb-3">
                        <label for="inputTextarea"  class="form-label">Текст отзыва</label>
                        <textarea class="form-control" name="Comment[text]" id="inputTextarea" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="Comment[good_id]" value="<?= $_GET['id']; ?>">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form> 
            </div>
            
        </div>
    </div>

    <? include '../templates/_load-scripts.php'; ?>
</body>
</html>
