<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function store(int $articleId): void
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            die('Вы должны быть авторизованы для добавления комментария.');
        }

        $user = $_SESSION['user'];

        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId($user->id);                  
        $comment->setAuthorNickname($user->nickname);     
        $comment->setArticleId($articleId);
        $comment->save();

        header("Location: /student-241/Project/www/article/{$articleId}#comment" . $comment->getId());
        exit;
    }

    public function edit(int $commentId): void
    {
        session_start();

        $comment = Comment::getById($commentId);

        if (!isset($_SESSION['user']) || $_SESSION['user']->id !== $comment->getAuthorId()) {
            die('Доступ запрещён.');
        }

        $this->view->renderHtml('comments/edit', ['comment' => $comment]);
    }

    public function update(int $commentId): void
    {
        session_start();

        $comment = Comment::getById($commentId);

        if (!isset($_SESSION['user']) || $_SESSION['user']->id !== $comment->getAuthorId()) {
            die('Вы не можете редактировать этот комментарий.');
        }

        $comment->setText($_POST['text']);
        $comment->save();

        header("Location: /student-241/Project/www/article/" . $comment->getArticleId() . "#comment" . $comment->getId());
        exit;
    }

    public function delete(int $commentId): void
    {
        session_start();

        $comment = Comment::getById($commentId);

        if (!isset($_SESSION['user']) || $_SESSION['user']->id !== $comment->getAuthorId()) {
            die('Удаление запрещено.');
        }

        $articleId = $comment->getArticleId();
        $comment->delete();

        header("Location: /student-241/Project/www/article/{$articleId}");
        exit;
    }
}

