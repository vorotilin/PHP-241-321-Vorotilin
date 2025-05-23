<?php
require_once 'menu.php';
require_once 'viewer.php';
require_once 'add.php';
require_once 'edit.php';
require_once 'delete.php';

$mode = $_GET['mode'] ?? 'view';
$sort = $_GET['sort'] ?? 'added';
$page = $_GET['page'] ?? 1;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>NoteBook</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <p class="center-text">NoteBook</p>
</header>

<main>
    <?= getMenu($mode, $sort) ?>

    <section class="content-wrapper">
        <?php
        switch ($mode) {
            case 'add':
                echo addForm();
                break;
            case 'edit':
                echo editForm();
                break;
            case 'delete':
                echo deleteContact();
                break;
            case 'view':
            default:
                echo showContacts($sort, $page);
        }
        ?>
    </section>
</main>

<footer>
    Задание для самостоятельной работы
</footer>
</body>
</html>