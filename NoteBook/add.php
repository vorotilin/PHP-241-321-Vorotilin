<?php
require_once 'db.php';

function addForm() {
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $s = $_POST;
        $query = "INSERT INTO contacts (surname, name, lastname, gender, date, phone, location, email, comment) VALUES (
            '{$s['surname']}', '{$s['name']}', '{$s['lastname']}', '{$s['gender']}', '{$s['date']}',
            '{$s['phone']}', '{$s['location']}', '{$s['email']}', '{$s['comment']}'
        )";
        if (mysqli_query($GLOBALS['conn'], $query)) {
            $message = '<p class="success">Запись добавлена</p>';
        } else {
            $message = '<p class="error">Ошибка: запись не добавлена</p>';
        }
    }
    ob_start();
    include 'form.php';
    return $message . ob_get_clean();
}