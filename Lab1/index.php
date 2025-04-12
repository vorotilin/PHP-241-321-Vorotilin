<?php
    echo "Задание 1: ";
    $a = 27; 
    $b = 12;
    $c  = sqrt($a**2 + $b**2);
    echo number_format($c, 2);
    echo "<BR>";
?>

<?php 
    echo "Задание 10: ";
    $hunter = 'охотник'; 
    $wants_to = 'желает';
    $know = 'знать'; 
    $fizan = 'фазан'; 
    $sits = 'сидит'; 
    $result = "$hunter $wants_to $know, где $fizan $sits.";
    echo $result;
    echo "<BR>";
?>

<?php 
    echo "Задание 23: ";
    $a = 7;
    $b = 4;
    $c = ' воробья';
    $result = ($a - $b) . $c;
    echo $result;
    echo "<BR>";
?>

<?php 
    echo "Задание 35: ";
    $a = 36;
    $b = '4';
    $ost = $a % $b;
    $type = gettype($ost);
    $result = $ost > 0 
    ? "Тип данных: " . $type . ", Остаток: " . ($ost) 
    : "$a / $b = " . ($a / $b);
    echo $result;
    echo "<BR>";
?>

<?php 
    echo "Задание 50: ";
    $start = 1;
    $end = $start + 20;
    $current = $start;
    $result = 0;
    do {
        $result = $result + $current;
        $current = $current + 1;
    }
    while ($current < $end);
    echo $result;
    echo "<BR>";
?>


