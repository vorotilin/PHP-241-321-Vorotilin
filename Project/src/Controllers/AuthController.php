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
            header('Location: /');
            exit;
        }
        
        header('Location: /?auth_error=1');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /');
        exit;
    }
}