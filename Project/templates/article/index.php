<?php require(dirname(__DIR__).'/header.php');?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Дата</th>
      <th scope="col">Название</th>
      <th scope="col">Текст</th>
      <th scope="col">Автор</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=1;
     foreach($articles as $article):?> 
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?=$article->getCreatedAt();?></td>
      <td><a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>"><?=$article->getTitle();?></a></td>
      <td><?=$article->getText();?></td>
      <td><?=$article->getAuthorId()->getNickname();?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<script src="script.js"></script>