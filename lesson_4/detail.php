<?php
if($_GET['name']){?>
    <img width="600" src="img/<?= $_GET['name']?>" alt="">
<?php
}
?>
<a href="<?= $_SERVER['HTTP_REFERER']?>">Вернуться назад</a>
