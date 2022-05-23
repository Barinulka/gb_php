<? include 'calc-core.php'; ?>
<?php
    $arg1 = 0; $arg2 = 0; $result = 0; $operation = 'add';
    if ($_POST) {
        $arg1 = $_POST['arg1'];
        $arg2 = $_POST['arg2'];
        $operation = $_POST['operation'];
    }

    $result = mathOperation($arg1,$arg2,$operation);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calc one</title>

    <style type="text/css">
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .input-field {
            padding: 10px;
            border-radius: 8px;
            border: none;
            outline:none;
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.5);
            transition: all 0.5s ease 0s;
            background: none;
            cursor: pointer;
            font-size: 20px;
            line-height: 22px;
        }
       
        .input-field:hover {
            box-shadow: 0px 0px 0px 2px rgba(0, 0, 0, 0.65);
        }
       
        .input-field:focus {
            box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.75);
        }

        .input-field:active {
            box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.75);
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="number" name="arg1" value="<?= $arg1; ?>" class="input-field">
        <select name="operation" class="input-field">
            <option <?= ($operation == 'add') ? "selected" : " "; ?> value="add">+</option>
            <option <?= ($operation == 'sub') ? "selected" : " "; ?> value="sub">-</option>
            <option <?= ($operation == 'mul') ? "selected" : " "; ?> value="mul">*</option>
            <option <?= ($operation == 'div') ? "selected" : " "; ?> value="div">/</option>
        </select>
        <input type="number" name="arg2" value="<?= $arg2; ?>" class="input-field">
        <input type="submit" value="=" class="input-field">
        <b class="input-field"><?= $result; ?></b>
    </form>
</body>
</html>