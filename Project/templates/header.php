<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($title ?? 'Фреймворк: Илья Воротилин') ?></title>
  <link rel="stylesheet" href="/student-241/Project/www/normalize.css" />
  <link rel="stylesheet" href="/student-241/Project/www/style.css" />
</head>
<body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="/student-241/Project/www/index.php">Articles</a>
    
    <nav class="nav">
      <ul class="nav-list">
        <li><a href="/student-241/Project/templates/main/hello.php" class="nav-link">Приветствие</a></li>
        <?php if (isset($_SESSION['user'])): ?>
          <li><a href="/student-241/Project/templates/article/create.php" class="nav-link">Создать статью</a></li>
        <?php endif; ?>
      </ul>
    </nav>

    <div class="auth-actions">
      <?php if (isset($_SESSION['user'])): ?>
        <span class="user-greeting">Привет, <?= htmlspecialchars($_SESSION['user']->nickname ?? 'Пользователь') ?></span>
        <a href="/student-241/Project/templates/auth/logout.php" class="btn">Выйти</a>
      <?php else: ?>
        <button id="openLoginModal" class="btn">Войти</button>
        <button id="openRegisterModal" class="btn">Зарегистрироваться</button>
      <?php endif; ?>
  </div>
  </div>
</header>

<div id="loginModal" class="modal-overlay hidden">
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
      <button type="submit" class="btn">Войти</button>
    </form>
  </div>
</div>
<div id="registerModal" class="modal-overlay hidden">
  <div class="modal-container">
    <button class="modal-close">&times;</button>
    <h2>Регистрация</h2>
    <form method="post" action="/student-241/Project/templates/auth/register.php">
      <div class="form-group">
        <label for="reg-nickname">Никнейм</label>
        <input type="text" id="reg-nickname" name="nickname" required />
      </div>
      <div class="form-group">
        <label for="reg-password">Пароль</label>
        <input type="password" id="reg-password" name="password" required />
      </div>
      <button type="submit" class="btn">Зарегистрироваться</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const loginModal = document.getElementById('loginModal');
    const openLoginBtn = document.getElementById('openLoginModal');
    const registerModal = document.getElementById('registerModal');
    const openRegisterBtn = document.getElementById('openRegisterModal');

    if (openLoginBtn) {
      openLoginBtn.addEventListener('click', () => {
        loginModal.classList.add('active');
      });
    }

    if (openRegisterBtn) {
      openRegisterBtn.addEventListener('click', () => {
        registerModal.classList.add('active');
      });
    }

    const closeButtons = document.querySelectorAll('.modal-close');
    closeButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        loginModal.classList.remove('active');
        registerModal.classList.remove('active');
      });
    });

    [loginModal, registerModal].forEach(modal => {
      modal.addEventListener('click', function (e) {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
    });
  });
</script>

<?php if (isset($_GET['auth_error'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('loginModal');
      modal.classList.add('active');
      alert('Неверный логин или пароль');
    });
  </script>
<?php endif; ?>
<?php if (isset($_GET['register_error'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('registerModal');
      modal.classList.add('active');
      alert(
        <?= $_GET['register_error'] === 'exists'
          ? "'Пользователь с таким никнеймом уже существует'"
          : "'Ошибка регистрации. Попробуйте снова.'" ?>
      );
    });
  </script>
<?php endif; ?>

<main class="container mt-4">
