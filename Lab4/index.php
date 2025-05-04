<?php 
    echo "Задание 2: ";
    echo "<BR>";
    function DomainValidate($url) {
        $pattern = '#^(http://|https://)([a-zA-Z0-9-]+\.[a-zA-Z]{2,})(/.*)?$#';
        return preg_match($pattern, $url) === 1;
    }   
    $domains = [
        "http://site.ru",
        "ftp://site.ru",
        "https://site.ru",
    ];
    foreach ($domains as $urlEx) { 
        if (DomainValidate($urlEx)) {
            echo "- $urlEx - домен подходит";
        } 
        else {
            echo "- $urlEx - домен не подходит";
        }
        echo "<BR>";  
    };
?>

<?php 
    echo "Задание 7";
    echo "<BR>";
    function EmailValidate($email) {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email) === 1;
    }
    $emails = [
        "mymail@mail.ru",
        "my.mail@mail.ru",
        "my-mail@mail.ru",
        "my_mail@mail.ru",
        "mail@mail.com",
        "mail@mail.by",
        "mail@yandex.ru",
        "kaka@pupi",
        "bo",
    ];
    foreach ($emails as $email) {
        if (EmailValidate($email)) {
            echo "- $email - корректный email";
        } 
        else {
            echo "- $email - некорректный email";
        }
        echo "<BR>";     
    }
?>

<?php 
    echo "Задание 17";
    echo "<BR>";
    $string = 'aeeea aeea aea axa axxa axxxa';
    preg_match_all('/a(e{2}|x+)a/', $string, $blocks);
    echo "Найдены строки:";
    foreach ($blocks[0] as $block) {
        echo " $block";
    }
    echo "<BR>";
?>

<?php 
    echo "Задание 28";
    echo "<BR>";
    $string = 'aaa aaa aaa';
    $pattern = '/aaa(?!.*aaa)/';
    $mark = '!';
    $result = preg_replace($pattern, $mark, $string);
    echo $result; 
    echo "<BR>";
?>

<?php
    echo "Задание 42";
    echo "<BR>";
    $string = '*+ *q+ *qq+ *qqq+ *qqq qqq+';
    $pattern = '/\*q{0,3}\+/';
    preg_match_all($pattern, $string, $items);
    echo "Найдены строки:";
    foreach ($items[0] as $item) {
        echo " $item";
    }
    echo "<BR>";
?>

