<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($title ?? 'Фреймворк: Илья Воротилин') ?></title>
  <link rel="stylesheet" href="/student-241/Project/www/normalize.css" />
  <link rel="stylesheet" href="/student-241/Project/www/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/student-241/Project/www/index.php">Articles</a>

      <div class="d-flex align-items-center">
        <?php if (isset($_SESSION['user'])): ?>
          <div class="me-3">
            <span class="navbar-text">Добро пожаловать, <?= htmlspecialchars($_SESSION['user']->nickname ?? 'Пользователь') ?></span>
          </div>
          <a href="/student-241/Project/templates/auth/logout.php" class="btn btn-outline-danger me-2">Выйти</a>
        <?php else: ?>
          <button id="openLoginModal" class="btn btn-primary me-2">Войти</button>
          
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/student-241/Project/templates/main/hello.php">Hello</a>
          </li>
          <?php if (isset($_SESSION['user'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="/student-241/Project/templates/article/create.php">Создать статью</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<div id="loginModal" class="modal-overlay">
  <div class="modal-container">
    <button class="modal-close">&times;</button>
    <h2>Вход в систему</h2>
    <form method="post" action="/student-241/Project/templates/auth/auth.php">
      <div class="form-group">
        <label for="nickname">Никнейм</label>
        <input type="text" id="nickname" name="nickname" required />
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit">Войти</button>
    </form>
  </div>
</div>

<?php if (isset($_GET['auth_error'])): ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = new bootstrap.Modal(document.getElementById('loginModal'));
    modal.show();
    alert('Неверный логин или пароль');
  });
</script>
<?php endif; ?>

<main class="container mt-4">
