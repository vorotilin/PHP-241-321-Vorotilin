<?php
function evaluateTrigFunction($func, $value) {
    $radians = deg2rad($value);
    switch (strtolower($func)) {
        case 'sin': return sin($radians);
        case 'cos': return cos($radians);
        case 'tan': return tan($radians);
        case 'cot':
            $tan = tan($radians);
            if ($tan == 0) throw new Exception("Ошибка");
            return 1 / $tan;
        default:
            throw new Exception("Некорректные данные функции: $func");
    }
}
?>
