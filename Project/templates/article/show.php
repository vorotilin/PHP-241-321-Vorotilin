<?php require(dirname(__DIR__).'/header.php');?>
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getTitle();?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickname();?></h6>
    <p class="card-text"><?=$article->getText();?></p>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/edit" class="card-link">Article update</a>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/delete" class="card-link">Article delete</a>
  </div>
</div>
<form action="/student-241/Project/www/article/<?= $article->getId(); ?>/comments" method="POST">
    <textarea name="text" rows="3" class="form-control" required></textarea><br>
    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
</form>

<br>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Автор</th>
            <th>Комментарий</th>
            <th>Дата</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($comments as $comment): ?>
            <tr id="comment<?= $comment->getId(); ?>">
                <th scope="row"><?= $i++; ?></th>
                <td><?= htmlspecialchars($comment->getAuthor()->getNickname()); ?></td>
                <td><?= nl2br(htmlspecialchars($comment->getText())); ?></td>
                <td><?= $comment->getCreatedAt(); ?></td>
                <td>
                  <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comments/<?= $comment->getId(); ?>/edit">Редактировать</a>
                  <br>
                  <a href="/student-241/Project/www/comments/<?= $comment->getId(); ?>/delete" onclick="return confirm('Удалить комментарий?');">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require(dirname(__DIR__).'/footer.html');?>
<script src="/student-241/Project/www/script.js"></script>