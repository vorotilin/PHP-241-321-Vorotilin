<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;

class CommentController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function store(int $articleId): void
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']->id)) {
            die('Вы должны быть авторизованы для добавления комментария.');
        }

        $userId = $_SESSION['user']->id;

        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId($userId);
        $comment->setArticleId($articleId);
        $comment->save();

        header("Location: /student-241/Project/www/article/{$articleId}#comment" . $comment->getId());
        exit;
    }

    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);


        $this->view->renderHtml('comments/edit', ['comment' => $comment]);
    }

    public function update(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        $comment->setText($_POST['text']);
        $comment->save();

        header("Location: /student-241/Project/www/article/" . $comment->getArticleId() . "#comment" . $comment->getId());
        exit;
    }

    public function delete(int $commentId): void
    {
        $comment = Comment::getById($commentId);


        $articleId = $comment->getArticleId();
        $comment->delete();
        if (
            !$comment ||
            !isset($_SESSION['user']->id) ||
            ((string)$_SESSION['user']->id !== (string)$comment->getAuthorId())
        ) {
            die('Доступ запрещён.');
        }

        header("Location: /student-241/Project/www/article/{$articleId}");
        exit;
    }
}

