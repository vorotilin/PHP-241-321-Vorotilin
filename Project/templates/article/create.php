<?php
require(dirname(__DIR__) . '/header.php');

if (!isset($_SESSION['user'])): ?>
    <p class="text-danger">Вы не авторизованы. Создание статьи невозможно.</p>
<?php else: ?>
    <form action="/student-241/Project/www/article/store" method="post">
        <div class="mb-3">
            <label for="date" class="form-label">Дата</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" id="text" rows="3" name="text" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить запись</button>
    </form>
<?php endif; ?>

<?php require(dirname(__DIR__) . '/footer.html'); ?>
<script src="script.js"></script>
