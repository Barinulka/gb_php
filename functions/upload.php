<? 
    require_once dirname(__DIR__).'/core/db.php';
    include '../functions/utls.php';
    include '../functions/goods.php';
    session_start();

    $message = ''; 

    if ($_POST['Obj']) {
        $good = $_POST['Obj'];
    }



    if ($_POST['Obj'] && $_FILES['image'] && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        // Информация по загруженному файлу
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // переименуем файл
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // проверка на допустимое расширение
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // директория с картинками
            $uploadFileDir = "../public/images/";
            $dest_path = $uploadFileDir . $newFileName;

            // сохраняем картинку
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $good['image'] = $newFileName;
                editGood($connect, $good);
                $message ='Файлы загружены';
            } else {
                $message = 'Не удалось загрузить файлы на сервер';
            }
        } else {
            $message = 'Ошибка загрузки фотографии. Доступные типы изображений: ' . implode(',', $allowedfileExtensions);
        }
    }
    else {
        $message = 'Товар обновлен без добавления картинки.<br>';
        editGood($connect, $good);
        $message ='Файлы загружены';
        $message .= 'Ошибка:' . $_FILES['image']['error'];
    }
    
    
    $_SESSION['message'] = $message;
    header("Location: ../admin/admin.php");