<? 
    require_once dirname(__DIR__).'/core/db.php';

    function getAllGoods($connect) {

        $goods = array();

        $sql = "SELECT * FROM goods ORDER BY data DESC";
        
        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));

        foreach ($result as $good) {
            $goods[] = $good;
        }
    
        return $goods;
    }

    function getGoodByID ($connect, $id) {
        $good = array();

        $id = (int)$id;

        $sql = sprintf("SELECT * FROM goods where id=%d ",$id);

        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));

        foreach ($result as $val) {
            $good = $val;
        }
    
        return $good;
    }

    function editGood ($connect, $good) {
        
        $data = time();
        
        $name = mysqli_real_escape_string($connect, $good['name']);
        $descr = mysqli_real_escape_string($connect, $good['descr']);
        $short = mysqli_real_escape_string($connect, $good['short']);
        $price = mysqli_real_escape_string($connect, $good['price']);
        $image = '';
        if (!empty($good['image']))
            $image = mysqli_real_escape_string($connect, $good['image']);

        if ($good['gId']) {
            $id = mysqli_real_escape_string($connect, $good['gId']);
            if (empty($image)) {
               $image = getImageName($connect, $good['gId']);
            }
            $sql = sprintf("UPDATE goods SET name = '$name', descr = '$descr', short = '$short', price = '$price', image = '$image', data = '$data' WHERE id = '$id'");
        } else {
            $sql = "INSERT INTO goods (name, descr, short, price, image, data) VALUES ('$name','$descr','$short','$price','$image' ,'$data')";
        }

        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));

        return true;
    }

    function deleteGood ($connect, $id) {
        $id = (int)$id;

        if($id == 0)
            return false;
    
        $sql = sprintf("DELETE FROM goods where id='%d'", $id);
        $result = mysqli_query($connect, $sql);
    
        if(!$result)
            die(mysqli_error($connect));
    
        return true;
    }

    function getImageName($connect, $id) {
        $image = '';

        $id = (int)$id;

        $sql = sprintf("SELECT * FROM goods where id=%d ",$id);

        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));

        foreach ($result as $val) {
            $image = $val['image'];
        }
    
        return $image;
    }