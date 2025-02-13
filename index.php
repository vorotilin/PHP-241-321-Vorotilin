<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>241-321 Воротилин PHP Задание 1</title>
    <link rel="stylesheet" href="nomalize.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img id="logo" src="images/logo.jpeg" alt="Лого">
        <p class="center-text">Домашняя работа: Hello, World!</p>
        <div></div>
    </header>
    <main>
        <section class="content-wrapper">
            <?php
                date_default_timezone_set('Europe/Moscow');
                $currentTime = date('H:i:s');
                echo "<h1>$currentTime</h1>";
            ?>
        </section>
    </main>
    <footer>
        Задание для самостоятельно работы
    </footer>
</body>
</html>