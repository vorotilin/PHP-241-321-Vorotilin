<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;

class ArticleController
{
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View;  
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }

    public function show($id){
        $article = Article::getById($id);
            if ($article == []) 
        {
            $this->view->renderHtml('error/404', [], 404);
            return;
        }
        $comments = Comment::findAllByColumn('article_id', $article->getId());
        $this->view->renderHtml('article/show', [
        'article' => $article,
        'comments' => $comments
        ]);
    }

    public function edit($id){
        $article = Article::getById($id);
        $this->view->renderHtml('article/edit', ['article'=>$article]);
    }

    public function update($id){
        $article = Article::getById($id);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->save();
        return header('Location: http://localhost/student-241/Project/www/article/'.$article->getId());
    }

    public function create()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: http://localhost/student-241/Project/www/index.php');
        exit;
    }

    $this->view->renderHtml('article/create');
}

public function store()
{
    if (!isset($_SESSION['user'])) {
        die('Unauthorized');
    }

    $authorId = $_SESSION['user']->id ?? null;

    if ($authorId === null) {
        die('Unauthorized');
    }

    $article = new Article();
    $article->setTitle($_POST['title']);
    $article->setText($_POST['text']);
    
    if (!empty($_POST['date'])) {
        $article->setCreatedAt($_POST['date']);
    }

    $article->setAuthorId($authorId);
    $article->save();

    header('Location: http://localhost/student-241/Project/www/index.php');
    exit;
}




    public function delete(int $id){
        $article = Article::getById($id);
        $article->delete();
        return header('Location: http://localhost/student-241/Project/www/index.php');
    }
}