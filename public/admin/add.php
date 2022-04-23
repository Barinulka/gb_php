<div class="container">

    <h1>Админка</h1>
    <h3>Добавить товар</h3>
    <? $actionDir = dirname(__DIR__).'/admin/core.php'; ?>

    <form method="post" action="core.php" enctype="multipart/form-data">
        <input type="text" name="Obj[name]" maxlength="100" required placeholder="Название"><br><br>
        <input type="text" name="Obj[description]" required placeholder="Описание"><br><br>
        <input type="number" name="Obj[price]" maxlength="20" required placeholder="Цена"><br><br>
        <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
        <input type="file" name="img" accept="image/jpeg,image/png,image/gif" required>
        <input type="submit">
    </form>

</div>