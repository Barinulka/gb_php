<? 
    include_once "../../core/db.php";
    include_once "../../functions/goods.php";
    include_once "image.php";    

    if($_POST['Obj']){
        $goods = $_POST['Obj'];
        $filePath  = $_FILES['img']['tmp_name'];
        $fileName  = translate($_FILES['img']['name']);
        $type = $_FILES['img']['type'];
        $size = $_FILES['img']['size'];
        
        if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
            echo $type;
            if($size>0 and $size<1000000){
                echo $size;
                if(copy($filePath,"tmp/".$fileName)){
                    
                    image_resize("../images/".$fileName, 286, 160);
                    // if(isset($_POST['edit'])){
                    //     $id = (int)trim(strip_tags($_POST['edit']));
                    //     goods_edit($link, $id, $name, $description, DIR_BIG.$fileName, DIR_SMALL.$fileName, $price);
                    //     header("Location: ../admin/index.php");
                    // }else{
                        $good['Obj']['image'] = $fileName;
                        addGoods($connect, $good);
                        header("Location: ../../admin.php");
                    // }
        
                    $message = "<h3>Файл успешно загружен на сервер</h3>";
                }else{
                    echo"<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                    // exit;
                }
            }else{
                $message = "<b>Ошибка - картинка превышает 1 Мб.</b>";
            }
        }else{
            $message = "<b>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</b>";
        }


    }