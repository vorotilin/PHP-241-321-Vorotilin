<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>241-321 Воротилин PHP Задание 2</title>
    <link rel="stylesheet" href="nomalize.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <img id="logo" src="images/logo.jpeg" alt="Лого">
        <p class="center-text">Feedback Form</p>
        <div></div>
    </header>
    <main>
        <section>
            <h1>Результат</h1>
            <div class="mega-block">
                <?php
                    $url = "https://httpbin.org/get"; 
                    $headers = get_headers($url, 1);
                    $output = print_r($headers, true);
                ?>
                <textarea rows="15" cols="80" readonly><?php echo htmlspecialchars($output); ?></textarea>
            </div>
            <a href="index.php">
                <button>Вернуться</button>
            </a>
            </div>
        </section>
    </main>
    <footer>
        Задание для самостоятельно работы
    </footer>
</body>
</html>