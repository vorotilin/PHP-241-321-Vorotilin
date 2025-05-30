<?php require(dirname(__DIR__) . '/header.php'); ?>

<?php if (!isset($_SESSION['user'])): ?>
    <p class="text-danger">Вы должны быть авторизованы, чтобы редактировать комментарии.</p>
<?php elseif ((string)$_SESSION['user']->id !== (string)$comment->getAuthorId()): ?>
    <p class="text-danger">У вас нет прав редактировать этот комментарий.</p>
<?php else: ?>
    <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comments/<?= $comment->getId(); ?>/update" method="POST">
        <div class="mb-3">
            <label for="text" class="form-label">Текст</label>
            <textarea name="text" id="text" rows="4" class="form-control" required><?= htmlspecialchars($comment->getText()); ?></textarea>
        </div>
        <input type="hidden" name="nickname" value="<?= htmlspecialchars($_SESSION['user']->nickname) ?>">
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
<?php endif; ?>

<?php require(dirname(__DIR__) . '/footer.html'); ?>

