<?php

    function add($a, $b) {
        return $a + $b;
    }

    function sub($a, $b) {
        return $a - $b;
    }

    function mul($a, $b) {
        return $a * $b;
    }

    function div($a, $b) {
        if ($b == 0) {
            return "деление на 0!";
        } else {
            return $a / $b;
        }
    }


    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case "add":
                return add($arg1, $arg2);
                break;
            case "sub":
                return sub($arg1, $arg2);
                break;
            case "mul": 
                return mul($arg1, $arg2);
                break;
            case "div":
                return div($arg1, $arg2);
                break;
            default:
                return "0";
        }
    }