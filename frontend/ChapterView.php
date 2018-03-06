<?php $title = ($post['title']) ?>

<?php ob_start(); ?>
<!--getChapterTitle--> 
<div class="main">
        <div class="entree">
        <h1><?= htmlspecialchars($post['title']) ?></h1>

<!--getChapterImg--> 
        <img src="<?= $post['chapter_img'] ?>" alt="toto" title="toto" />

<!--getChapterDate-->                
        <p>Posté le <?= $post['chapter_date_fr'] ?></p>
        </div>
<!--getChapterText-->    
<div class="sortie">
        <p><?= nl2br(htmlspecialchars($post['chapter_text'])) ?></p>      
</div>

<h2>Commentaires</h2>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['username']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
<?php
}
?>
<?= $post['id']?>
<form action="index.php?action=addComment&amp;id=<?=$post['id'] ?>" method="post">
<div>
<div>
<label for="comment">ID users</label><br />
<textarea id="comment" name="id_Users">1</textarea>
</div>
<div>
<div hidden>
<label for="comment">ID chapters</label><br />
<textarea id="comment" name="id_Chapters"><?= $_GET['id'] ?></textarea>
</div>

<div>
<label for="comment">Commentaire</label><br />
<textarea id="comment" name="comment_text"></textarea>
</div>
<div>
<input type="submit" />
</div>
</form>












</div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('template2.php'); ?>