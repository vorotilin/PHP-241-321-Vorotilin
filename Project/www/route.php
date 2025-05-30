<?php

use src\Controllers\ArticleController;
use src\Controllers\AuthController;
use src\Controllers\CommentController;
use src\Controllers\MainController;

return [
    '~^$~' => [ArticleController::class, 'index'],

    '~^article/create$~' => [ArticleController::class, 'create'],
    '~^article/store$~' => [ArticleController::class, 'store'],
    '~^article/(\d+)$~' => [ArticleController::class, 'show'],
    '~^article/(\d+)/edit$~' => [ArticleController::class, 'edit'],
    '~^article/(\d+)/update$~' => [ArticleController::class, 'update'],
    '~^article/(\d+)/delete$~' => [ArticleController::class, 'delete'],
    '~^article/(\d+)/comments$~' => [CommentController::class, 'store'],

    '~^comments/(\d+)/edit$~' => [CommentController::class, 'edit'],
    '~^comments/(\d+)/update$~' => [CommentController::class, 'update'],
    '~^comments/(\d+)/delete$~' => [CommentController::class, 'delete'],

    '~^hello/(.+)$~' => [MainController::class, 'sayHello'],

    '~^login$~' => [AuthController::class, 'login'], 
    '~^auth$~' => [AuthController::class, 'authenticate'],
    '~^register$~' => [AuthController::class, 'register'],
    '~^logout$~' => [AuthController::class, 'logout'],
];
