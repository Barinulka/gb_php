<?php

    // 1.   Объявить две целочисленные переменные $a и $b и задать им произвольные начальные
    //      значения. Затем написать скрипт, который работает по следующему принципу:
    //          a. Если $a и $b положительные, вывести их разность.
    //          b. Если $а и $b отрицательные, вывести их произведение.
    //          c. Если $а и $b разных знаков, вывести их сумму.
    //      Ноль можно считать положительным числом. 

    // $a = 5;
    // $b = -2;

    // if ($a >= 0 && $b >= 0) {
    //     $sub = $a - $b;
    //     echo "$a и $b положительные. $a - $b = $sub";
    // } else if ($a < 0 && $b < 0) {
    //     $mul = $a * $b;
    //     echo "$a и $b отрицательные. $a * $b = $mul";
    // } else {
    //     $add = $a + $b;
    //     echo "$a и $b разных знаков. $a + $b = $add";
    // }
    
    // 2.   Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
    //      switch организовать вывод чисел от $a до 15.

    // $a = 9;

    // switch ($a) {
    //     case 1:
    //         echo $a++ . " ";
    //     case 2:
    //         echo $a++ . " ";
    //     case 3:
    //         echo $a++ . " ";
    //     case 4:
    //         echo $a++ . " ";
    //     case 5:
    //         echo $a++ . " ";
    //     case 6:
    //         echo $a++ . " ";
    //     case 7:
    //         echo $a++ . " ";
    //     case 8:
    //         echo $a++ . " ";
    //     case 9:
    //         echo $a++ . " ";
    //     case 10:
    //         echo $a++ . " ";
    //     case 11:
    //         echo $a++ . " ";
    //     case 12:
    //         echo $a++ . " ";
    //     case 13:
    //         echo $a++ . " ";
    //     case 14:
    //         echo $a++ . " ";
    //     case 15:
    //         echo $a++;
    //         break;
    //     default: 
    //         echo $a;
    // }


    // 3.   Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
    //      Обязательно использовать оператор return.

    // function add($a, $b) {
    //     return $a + $b;
    // }

    // function sub($a, $b) {
    //     return $a - $b;
    // }

    // function mul($a, $b) {
    //     return $a * $b;
    // }

    // function div($a, $b) {
    //     if ($b == 0) {
    //         return "деление на 0!";
    //     } else {
    //         return $a / $b;
    //     }
    // }


    // // $add = add(5, 2);
    // // $sub = sub(5, 2);
    // // $mul = mul(5, 2);
    // // $div = div(5, 0);
    // // echo "сумма: $add<br>
    // //     разность: $sub<br>
    // //     произведение: $mul<br>
    // //     деление: $div";

    // // 4.   Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
    // //      где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В
    // //      зависимости от переданного значения операции выполнить одну из арифметических операций
    // //      (использовать функции из пункта 3) и вернуть полученное значение (использовать switch)

    // function mathOperation($arg1, $arg2, $operation) {
    //     switch ($operation) {
    //         case "add":
    //             return add($arg1, $arg2);
    //             break;
    //         case "sub":
    //             return sub($arg1, $arg2);
    //             break;
    //         case "mul": 
    //             return mul($arg1, $arg2);
    //             break;
    //         case "div":
    //             return div($arg1, $arg2);
    //             break;
    //         default:
    //             return "доступные операции:<br>
    //                     сложение - 'add'<br>
    //                     вычитание - 'sub'<br>
    //                     умножение - 'mul'<br>
    //                     деление - 'div'";
    //     }
    // }

    // $result = mathOperation(5,2,'mul');

    // echo $result;
?>

    <!-- // 5.   Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести
    //      текущий год в подвале при помощи встроенных функций PHP.
    
    //      В HTML шаблон с использование встроеных функций год вставится следующим образом -->

    <span><?= date('Y'); ?></span>

<?php
    // 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function
    // power($val, $pow), где $val – заданное число, $pow – степень.

    // function power($val, $pow) {
        
    //     if ($pow == 0) {
    //         return 1;
    //     } else {
    //         return $val * power($val, $pow-1);
    //     }

    // }

    // $result = power(5, 2);

    // echo $result;

    // 7.   *Написать функцию, которая вычисляет текущее время и возвращает его в формате с
    //      правильными склонениями, например: 22 часа 15 минут, 21 час 43 минуты
    
    

    function formatTime($h, $m) {
       
       $strH = formatter($h, 'час', 'часа', 'часов');
       $strM = formatter($m, 'минута', 'минуты', 'минут');

       return "$h $strH $m $strM";
    }

    function formatter($n, $form1, $form2, $form3) {
        $n  = abs($n) % 100;
        $n1 = $n % 10;
       
        if ($n > 10 && $n < 20) return $form3;
        if ($n1 > 1 && $n1 < 5) return $form2;
        if ($n1 == 1) return $form1;
    
        return $form3; 
    }  
    
    $h = date('H'); 
    $m = date('i');

    echo formatTime(21, 1);
    
    