<?php
    session_start();
?>

<?php 
    echo "Задание 1: ";
    if (empty($_SESSION['test-session'])) {
    $_SESSION['test-session'] = 'test';
    echo "Текст записан";
    } 
    else {
        echo "Содержимое сессии: " . $_SESSION['test-session'];
    }
    echo "<BR>";  
?>

<?php
    echo "Задание 3: ";
    if (!isset($_SESSION['updates'])) {
        $_SESSION['updates'] = 0;
        echo "Вы еще не обновляли страницу";
    } 
    else {
        $_SESSION['updates']++;
        echo "Количество обновлений: " . $_SESSION['updates'];
    }
    echo "<BR>";
?>

<?php
    echo "Задание 5: ";
    echo "Вы зашли на сайт ";
    if (!isset($_SESSION['time'])) {
        $_SESSION['time'] = time();
        echo "только что";
    } 
    else {
        $pasttime = time() - $_SESSION['time'];
        echo "$pasttime секунд назад.";
    }
    echo "<BR>";
?>

<?php
echo "Задание 7: ";
    if (!isset($_COOKIE['test'])) {
        setcookie('test', '123', time() + 20);
        echo "Кука установлена";
    } 
    else {
        echo "Куки test: " . $_COOKIE['test'];
    }
    echo "<BR>";
?>

<?php
    echo "Задание 9: ";
    if (isset($_COOKIE['visits-counter'])) {
        $count = $_COOKIE['visits-counter'] + 1;
        setcookie('visits-counter', $count, time() + 9999);
        echo "Вы посетили наш сайт $count раз!";
    } 
    else {
        setcookie('visits-counter', 1, time() + 9999);
        echo "Вы посетили наш сайт 1 раз!";
    }
    echo "<BR>";
?>
