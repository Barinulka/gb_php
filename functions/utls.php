<?
    /**
     * Удобная функция для тестирования
     */
    function EA($obj, $ex = true) { 
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        if ($ex) exit;
    }

    function numberFormatter($number) {
        $number = number_format($number, 0, ',', ' ');
        $number = $number . ' ₽';
        
        return $number;
    }
