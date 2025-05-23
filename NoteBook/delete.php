<?php
require_once 'db.php';

function deleteContact() {
    $output = '<h2>Удаление записи</h2>';

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $res = mysqli_query($GLOBALS['conn'], "SELECT surname FROM contacts WHERE id = $id");

        if ($res && $row = mysqli_fetch_assoc($res)) {
            $surname = htmlspecialchars($row['surname']);
            mysqli_query($GLOBALS['conn'], "DELETE FROM contacts WHERE id = $id");
            $output .= "<p class='success'>Запись с фамилией <strong>$surname</strong> удалена</p>";
        } else {
            $output .= "<p class='error'>Ошибка: запись не найдена или не может быть удалена</p>";
        }
    }

    $res = mysqli_query($GLOBALS['conn'], "SELECT id, surname, name FROM contacts ORDER BY surname, name");

    if (!$res || mysqli_num_rows($res) === 0) {
        $output .= "<p>Нет записей для удаления</p>";
    } else {
        $output .= "<ul class='delete-list'>";
        while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $surname = htmlspecialchars($row['surname']);
            $name = htmlspecialchars($row['name']);
            $output .= "<li><a href='index.php?mode=delete&id=$id'>$surname $name</a></li>";
        }
        $output .= "</ul>";
    }

    return $output;
}
?>



