<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'notebook';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');