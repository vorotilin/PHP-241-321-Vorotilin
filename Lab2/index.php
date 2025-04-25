<?php
    echo "Задание 1: ";
    $letters = ['a', 'b', 'c', 'b', 'a'];
    $result = array_count_values($letters);
    print_r($result);
    echo "<BR>";
?>

<?php
    echo "Задание 18: ";
    $array = [1, 2, 3, 4, 5];
    $insert = ['a', 'b', 'c'];
    $placemid = 3;
    array_splice($array, $placemid, 0, $insert);
    print_r($array);
    echo "<BR>";
?>

<?php
    echo "Задание 32: ";
    $string = implode('-', range(1, 9));
    echo $string;
    echo "<BR>";
?>

<?php
    echo "Задание 46: ";
    $array = [[[1, 2], [3, 4]], [[5, 6], [7, 8]]];
    function sum($miniarray) {
        $counter = 0;
        foreach ($miniarray as $item) {
            if (is_array($item)) {  
                $counter += sum($item);
            } else {
                $counter += $item;
            }
        }
        return $counter;
    }
    $result = sum($array);
    echo "Сумма элементов: " . $result;
    echo "<BR>";
?>

<?php
    echo "Задание 60: ";
    $array = ['Привет, ', 'мир', '!'];
    $text = implode('', $array);
    echo $text;
    echo "<BR>";
?>