        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['id_Users']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
        <?php
        }
        ?> 

<form action="index.php?action=postChapterComment&amp;id=<?= $post['id'] ?>" method="post">
<div>
    <label for="author">Auteur</label><br />
    <input type="text" id="author" name="author" />
</div>
<div>
    <label for="comment">Commentaire</label><br />
    <textarea id="comment" name="comment"></textarea>
</div>
<div>
    <input type="submit" />
</div>
</form> -->