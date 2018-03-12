<?php $title = ($post['title']) ?>

<?php ob_start(); ?>
<!--getChapterTitle--> 
        <div class="main">
                <div class="entree">
                        <h1 id="chapterName"><?= htmlspecialchars($post['title']) ?></h1>

<!--getChapterImg--> 
                        <img src="<?= $post['chapter_img'] ?>" alt="illustration du chapitre" title="photo n&b" />

<!--getChapterDate-->                
                        <p class="edition">Posté le <?= $post['chapter_date_fr'] ?> <a href="#comments">Commentaires</a></p>
                        
                </div>
<!--getChapterText-->    
                <div class="sortie">
                        <p><?= $post['chapter_text'] ?></p>      
                </div>
                <div class="comments" id="comments">
                        <h2>Commentaires</h2>
<!--commentsLoops-->
<?php
while ($comment = $comments->fetch())
{
?>
                        <p id="comments-<?= $comment->id ?>"><span class="blue"><strong><?= htmlspecialchars($comment['username']) ?></strong></span> le <?= $comment['comment_date_fr'] ?></p>
                        <p><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
<?php
}
?>
                        <form action="index.php?action=addComment&amp;id=<?=$post['id'] ?>" method="post">
                                <p>Postez votre commentaire :</p>
                                <div>
                                <label for="comment">ID users</label><br />
                                <textarea id="comment" name="id_Users">1</textarea>
                                </div>
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
                <div>
                        <p><a href="index.php#slide1">Revenir à la page d'accueil</a></p>
                        <p><a href="#chapterName">Revenir en haut de la page</a></p>
                </div>
        </div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('template2.php'); ?>