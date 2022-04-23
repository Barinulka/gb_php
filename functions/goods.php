<? 
    require_once dirname(__DIR__).'/core/db.php';

    function getAllGoods($connect) {

        $goods = array();

        $sql = "SELECT * FROM goods ORDER BY date DESC";
        
        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));

        foreach ($result as $good) {
            $goods[] = $good;
        }
    
        return $goods;
    }

    function addGoods($connect, $good) {

        $sql = "INSERT INTO goods (name, description, price, image, date) VALUES (".$good['Obj']['name'].",".$good['Obj']['description'].",".$good['Obj']['price'].",".$good['Obj']['image'].",".time().")";

    
        $result = mysqli_query($connect, $sql);
    
        if(!$result){
            die(mysqli_error($connect));
        }
    
        return true;
    }