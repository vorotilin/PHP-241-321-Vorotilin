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
            <h1>Форма обратной связи</h1>
            <form class="mega-block" action="https://httpbin.org/post" method="post" >               
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required>
                <label for="email">E-mail пользователя:</label>
                <input type="email" id="email" name="email" required>
                <label for="type">Тип обращения:</label>
                    <option value="жалоба">Жалоба</option>
                    <option value="предложение">Предложение</option>
                    <option value="благодарность">Благодарность</option>
                </select>
                <label for="message">Текст обращения:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                <label>Вариант ответа:</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="sms" name="response_via" value="sms">
                    <label for="sms" style="display: inline;">СМС</label><br>
                    <input type="checkbox" id="email-input" name="response_via" value="email">
                    <label for="email-input" style="display: inline;">E-mail</label>
                </div>
                <button type="submit">Отправить</button>
            </form>
            <a href="resultpage.php">
                <button>Результат</button>
            </a>
        </section>
    </main>
    <footer>
        Задание для самостоятельно работы
    </footer>
</body>
</html>