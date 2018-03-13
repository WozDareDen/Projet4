<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

    <div class="main">
        <h1>Tableau de Bord</h1>
        <div class="entree commentsEdition">
            <h2>Mes chapitres</h2>
                <ul>
                <?php 
    while ($data = $postAll->fetch())
{
    ?>
            <li><a href="index.php?action=post&id=<?= $data['id'] ?>">Chapitre <?=($data['chapter_number'])?> : <?= htmlspecialchars($data['title']) ?></a></li>
<?php      
}
$postAll->closeCursor(); 
?>    
                </ul>
        
            <h2>Les commentaires signalés</h2>
                <ul>
                    <li></li>
                </ul>
        
        </div>

        <div>
            <p><a href="index.php">Accéder au site</a></p>
            <p><a href="admin.php?action=edition">Accéder à l'Interface d'Edition</a></p>
         </div>
    </div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/backend/templateAdmin.php'); ?>