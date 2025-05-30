<?php
session_start(); 

require_once __DIR__ . '/../../src/Services/Db.php';
use src\Services\Db;

$db = Db::getInstance();

$nickname = $_POST['nickname'] ?? '';
$password = $_POST['password'] ?? '';
$errors = [];

if (empty($nickname) || empty($password)) {
    $errors[] = 'Пожалуйста, заполните все поля.';
}

$existingUser = $db->query("SELECT * FROM users WHERE nickname = ?", [$nickname]);

if (!empty($existingUser)) {
    $errors[] = 'Пользователь с таким никнеймом уже существует.';
}

if (empty($errors)) {
    $db->query(
        "INSERT INTO users (nickname, password) VALUES (?, ?)",
        [$nickname, $password]
    );

    $user = $db->query("SELECT * FROM users WHERE nickname = ? AND password = ?", [$nickname, $password])[0];

    $_SESSION['user'] = $user;

    header('Location: /student-241/Project/www/index.php');
    exit;
} else {
    foreach ($errors as $error) {
        echo '<p style="color:red;">' . htmlspecialchars($error) . '</p>';
    }
}
