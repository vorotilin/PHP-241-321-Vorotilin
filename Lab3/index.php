<?php 
    echo "Задание 2: ";
    $file= 'test.txt';
    $writeText= '12345';
    file_put_contents($file, $writeText);
    if (file_exists($file)) {
        echo "Текст записан в файл $file.";
    } else {
        echo "Файл не найден";
    }
    echo "<BR>";
?>

<?php
    echo "Задание 11: ";
    $file= 'test.txt';
    if (file_exists($file)) {
        $fileSize = filesize($file);
        echo "Размер файла $file: $fileSize байт";
    } else {
        echo "Файл не найден";
    }
    echo "<BR>";
?>

<?php
    echo "Задание 15: ";
    $fileArray = ['1.txt', '2.txt', '3.txt'];
    foreach ($fileArray as $fileItem) {
        if (file_exists($fileItem)) {
            echo "$fileItem существует; ";
        } else {
            echo "$fileItem не существует; ";
        }
    }
    echo "<BR>";
?>

<?php
    echo "Задание 20: ";
    $array = ['Первый элемент', 'Второй элемент', 'Третий элемент'];
    $file = 'test.txt';
    $content = '';
    foreach ($array as $iron) {
        $content .= $iron . "\n";
    }
    file_put_contents($file, $content);
    echo "Успешно записано в $file.";
    echo "<BR>";
?>

<?php
    echo "Задание 29: ";
    $file = 'test.txt';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        echo nl2br(htmlspecialchars($content));
    } else {
        echo "Файл не найден";
    }
    echo "<BR>";
?>