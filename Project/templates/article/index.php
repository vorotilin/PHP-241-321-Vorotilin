<?php require(dirname(__DIR__).'/header.php');?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Author</th>
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