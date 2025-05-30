<?php
    namespace src\Controllers;

    use src\Models\Users\User;

    class AuthController
    {
        public function authenticate()
        {
            $nickname = $_POST['nickname'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::getByNickname($nickname);
            
            if ($user && password_verify($password, $user->getPasswordHash())) {
                session_start();
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_nickname'] = $user->getNickname();
                $_SESSION['user'] = $user; // если ты используешь это в шаблонах
                header('Location: /student-241/Project/www/index.php');
                exit;
            }

            header('Location: /student-241/Project/www/index.php?auth_error=1');
            exit;
        }

        public function register()
        {
            $nickname = $_POST['nickname'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!$nickname || !$password) {
                header('Location: /student-241/Project/www/index.php?register_error=1');
                exit;
            }

            $existingUser = User::getByNickname($nickname);
            if ($existingUser) {
                header('Location: /student-241/Project/www/index.php?register_error=exists');
                exit;
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $user = User::create($nickname, $passwordHash);

            session_start();
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_nickname'] = $user->getNickname();
            $_SESSION['user'] = $user;

            header('Location: /student-241/Project/www/index.php');
            exit;
        }

        public function logout()
        {
            session_start();
            session_destroy();
            header('Location: /student-241/Project/www/index.php');
            exit;
        }
    }
