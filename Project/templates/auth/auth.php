<?php
session_start(); 

require_once __DIR__ . '/../../src/Services/Db.php';
use src\Services\Db;

$db = Db::getInstance();

$nickname = $_POST['nickname'] ?? '';
$password = $_POST['password'] ?? '';

$user = $db->query("SELECT * FROM users WHERE nickname = ? AND password = ?", [$nickname, $password]);

if ($user && count($user) > 0) {
    $_SESSION['user'] = $user[0]; 
    
    header('Location: /student-241/Project/www/index.php');; 
    exit; 
} else {
    echo "Неверный логин или пароль";
}
