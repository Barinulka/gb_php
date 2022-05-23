<?
    require_once dirname(__DIR__).'/core/db.php';
    // include "utls.php";

    if ($_POST['Comment']) {
        $Comment = $_POST['Comment'];

        $data = time();
        
        $name = mysqli_real_escape_string($connect, $Comment['name']);
        $email = mysqli_real_escape_string($connect, $Comment['email']);
        $text = mysqli_real_escape_string($connect, $Comment['text']);
        $good_id = mysqli_real_escape_string($connect, $Comment['good_id']);

        
        $sql = "INSERT INTO reviews (name, email, text, date, good_id) VALUES ('$name','$email','$text','$data','$good_id')";

        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));
        else
            header("Location: ../public/product.php?id=" . $good_id);
    }

    function getAllCommets($connect, $good_id) {
        $reviews = array();

        $good_id = (int)$good_id;

        $sql = sprintf("SELECT * FROM reviews where good_id=%d ORDER BY date ASC", $good_id);

        $result = mysqli_query($connect, $sql);

        if(!$result)
            die(mysqli_error($connect));

        foreach ($result as $val) {
            $reviews[] = $val;
        }
    
        return $reviews;
    }