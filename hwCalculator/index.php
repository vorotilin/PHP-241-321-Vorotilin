<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>241-321 Воротилин PHP Задание Calculator</title>
    <link rel="stylesheet" href="nomalize.css">
    <link rel="stylesheet" href="stylecalc.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img id="logo" src="images/logo.jpeg" alt="Лого">
        <p class="center-text">Домашняя работа: Calculator</p>
        <div></div>
    </header>
    <main>
        <section class="content-wrapper">
            <div class="calculator-wrapper">
                <div class="result-field">0</div>
                <button class="calc-btn calc-btn-big calc-clear">AC</button>
                <button class="calc-btn calc-btn-big calc-clear-one"><×</button>
                <button class="calc-btn calc-btn-big calc-result" method="POST">=</button>
                <button class="calc-btn calc-7">7</button>
                <button class="calc-btn calc-8">8</button>
                <button class="calc-btn calc-9">9</button>
                <button class="calc-btn calc-4">4</button>
                <button class="calc-btn calc-5">5</button>
                <button class="calc-btn calc-6">6</button>
                <button class="calc-btn calc-1">1</button>
                <button class="calc-btn calc-2">2</button>
                <button class="calc-btn calc-3">3</button>
                <button class="calc-btn calc-0">0</button>
                <button class="calc-btn calc-open">(</button>
                <button class="calc-btn calc-close">)</button>
                <button class="calc-btn calc-div">/</button>
                <button class="calc-btn calc-mult">×</button>
                <button class="calc-btn calc-minus">-</button>
                <button class="calc-btn calc-plus">+</button>
            </div>
        </section>
    </main>
    <footer>
        Задание для самостоятельно работы
    </footer>
</body>
<script src="script.js"></script>
</html>