<?php
    function solve($equ) {
        $equ = str_replace(" ", "", $equ);
        
        if (strpos($equ, '*') !== false) {
            list($left, $right) = explode('=', $equ);
            list($variable, $counterX) = explode('*', $left);
            
            $rightVal = intval($right);
            $counterXVal = intval($counterX);
            
            $variableVal= $rightVal / $counterXVal;
            
            return $variableVal;
        }
        return null;
    }
    $equInput = "X * 7 = 49";
    $result = solve($equInput);

    if ($result !== null) {
        echo "X: " . $result;
    } 
    else {
        echo "Нет данных";
    }
?>