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
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Админка</title>
</head>
<body>

    <? include '../templates/_header.php'; ?>

    <div class="content-block">
        <div class="container">
            <h2>Admin</h2>
            <div class="row">
            <? if (isset($_SESSION['message']) && $_SESSION['message']) : ?>
                <h3><?= '<b>%s</b>', $_SESSION['message']; ?></h3>
                <?unset($_SESSION['message']);?>
            <? endif; ?>
                <div class="col-12 flex-box admin">
                    <div class="card" >
                        <form action="../functions/upload.php" enctype="multipart/form-data" method="post"> 
                            <div class="card" style="width: 25rem;" >
                                <? if ($_GET['id']) : ?>
                                    <input type="hidden" name="Obj[gId]" id="name" value="<?= $_GET['id']; ?>" />
                                <? endif; ?>
                                <div class="card-body">
                                    <? if ($good) : ?>
                                        <img src="../public/images/<?= $good['image']; ?>" class="card-img-top" alt="image">
                                    <? endif; ?>
                                    <label for="image">Фотография</label>
                                    <input name="image" class="card-img-top" type="file" id="image" />
                                </div>
                                <div class="card-body">
                                    <label for="name">Название</label>
                                    <input class="card-title" type="text" name="Obj[name]" id="name" value="<?= $good ? $good['name'] : ''; ?>" />
                                </div>
                                <div class="card-body">
                                    <label for="descr">Описание</label>
                                    <input class="card-text" type="text" name="Obj[descr]" id="descr" value="<?= $good ? $good['descr'] : ''; ?>" />
                                </div>
                                <div class="card-body">
                                    <label for="short">Красткое описание</label>
                                    <input class="card-text" type="text" name="Obj[short]" id="short" value="<?= $good ? $good['short'] : ''; ?>" />
                                </div>
                                <div class="card-body">
                                    <label for="price">Цена</label>
                                    <input class="card-text" type="number" name="Obj[price]" id="price" value="<?= $good ? $good['price'] : ''; ?>" />
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="Сохранить">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <? include '../templates/_load-scripts.php'; ?>
</body>
</html>
