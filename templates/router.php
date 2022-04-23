<?
    // $url = $_SERVER['REQUEST_URI'];

    // switch ($url) {
    //     case '/admin': 
    //         include dirname(__DIR__).'/public/admin.php';
    //         break;
    //     case '/': 
    //         include dirname(__DIR__).'/public/catalog.php';
    //         break;
    //     default: 
    //         include dirname(__DIR__).'/public/_pnf.php';
    // }

    $url = $_SERVER['REQUEST_URI'];

    try {
        // проверяем, если в конце слеш, то это catalog
        if (substr($url,'-1') == '/') $url.='catalog';
    
        // ограничиваем имена до символов a-b, 0-9, тире, нижнее подчеркивание и слеш
        if (!preg_match('~^[-a-z0-9/_]+$~i', $url)) throw new Exception('Not allowed route');
    
        // путь к файлу
        $filePath = $_SERVER['DOCUMENT_ROOT'].'/public'.$url.'.php';
    
        // если не существует то на 404
        if (!file_exists($filePath)) {
            throw new Exception('Route not found');
        }
    
        include $filePath;
    } catch (Throwable $ex) {
        include $_SERVER['DOCUMENT_ROOT'].'/public/_pnf.php';
    }


    
?>  