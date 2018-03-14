<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

    <div class="main">
        <h1>Tableau de Bord</h1>
        <div class=" sortie commentsEdition commentsPannel">
            <h2>Mes chapitres</h2>
                <ul>
                <?php 
    while ($data = $postAll->fetch())
{
    ?>
            <li class="list">Chapitre <?=($data['chapter_number'])?> : <?= htmlspecialchars($data['title']) ?><div class="icons"><i class="fa fa-check colorTeal">&nbsp;&nbsp;</i><i class="fa fa-pencil">&nbsp;&nbsp;</i><a href="admin.php?action=delete&idChapter=<?=$data['id'] ?>"><i class="fa fa-trash colorRed" ></i></a></div></li>
        
<?php      
}
$postAll->closeCursor(); 
?>      </div>
        <div class="sortie commentsEdition">
                </ul>
        
            <h2>Les commentaires signalés</h2>         
            <dl>
               
                <dt class="list">Chapitre <?=($data['chapter_number'])?> : <?= htmlspecialchars($data['title']) ?></dt>
                    <dd>bla bla bla
                    </dd>
            </dl>
        </div>
        
        </div>

        <div>
            <p><a href="index.php">Accéder au site</a></p>
            <p><a href="admin.php?action=edition">Accéder à l'Interface d'Edition</a></p>
         </div>
    </div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/backend/templateAdmin.php'); ?>




