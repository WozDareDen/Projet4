<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

    <div class="main">
        <h1>Tableau de Bord</h1>
        <div class=" sortie commentsEdition commentsPannel">
            <h2>Mes chapitres</h2>
                <ul>
                <li><a href="admin.php?action=edition">Créez un nouveau chapitre</a></li>
                <?php 
    $rows = $postAll->fetchAll();  
    $postAll->closeCursor();
    foreach($rows as $data)
{
    ?>
            <li class="list">Chapitre <?=($data['chapter_number'])?> : <?= htmlspecialchars($data['title']) ?><div class="icons"><i class="fa fa-check colorTeal">&nbsp;&nbsp;</i><a href="admin.php?action=edit&idChapter=<?=$data['id'] ?>"><i class="fa fa-pencil">&nbsp;&nbsp;</i></a><a href="admin.php?action=delete&idChapter=<?=$data['id'] ?>"><i class="fa fa-trash colorRed" ></i></a></div></li>
        
<?php      
}
                
?>       </ul></div>
        <div class="sortie commentsEdition">
               
        
            <h2>Les commentaires signalés</h2>         
            <dl>
<?php            
 while($com = $comAll->fetch()){    
     ?>
                <dt class="list">Chapitre : <?=$com['chapter_number'] ?></dt>               
                    <dd><?= $com['comment_text'] ?>
                    </dd>
                    <dd>Posté le <?= $com['comment_date_short'] ?> et signalé <span class="fatRed"><?= $com['sig'] ?></span> fois.
                    <div class="icons"><a href="admin.php?action=approval&idComment=<?=$com['id'] ?>"<i class="fa fa-check colorTeal">&nbsp;&nbsp;</i></a><a href="admin.php?action=deleteCom&idComment=<?=$com['id'] ?>"><i class="fa fa-trash colorRed" ></i></a></div>
                    </dd>
<?php
}

?>                    
            </dl>
        </div>
        <div>
            <p><a href="index.php">Accéder au site</a></p>
            <p><a href="admin.php?action=edition">Accéder à l'Interface d'Edition</a></p>
         </div>
        </div>

       
    </div>


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/backend/templateAdmin.php'); ?>




