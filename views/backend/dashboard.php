<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	
<?php 
//VIEWS COUNT
if(file_exists('public/compteur_pages_vues.txt'))
{
        $compteur_f = fopen('public/compteur_pages_vues.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('public/compteur_pages_vues.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f); 
?>
<?php
//VISITS COUNT
if(file_exists('public/compteur_visites.txt'))
{
        $compteur_f2 = fopen('public/compteur_visites.txt', 'r+');
        $compte2 = fgets($compteur_f2);
}
else
{
        $compteur_f2 = fopen('public/compteur_visites.txt', 'a+');
        $compte2 = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte2++;
        fseek($compteur_f2, 0);
        fputs($compteur_f2, $compte2);
}
fclose($compteur_f2);
//DASHBOARD CHAPTERS LIST
?>
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
// DASHBOARD COMMENTS LIST                
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
//DASHBOARD STATS
?>                    
            </dl>
        </div>
        <div class="sortie commentsEdition">
            <h2> Mes utilisateurs</h2>
<?php 
$userAll = $useAll->fetch(); 
$statCom = $comStats->fetch();
$userInfo = $userInfos->fetch();
?>
            <p>Il y a <span class="fatRed"><?= $userAll[0] ?></span> utilisateurs inscrits sur le site.<br />
            Ils ont posté un total de <span class="fatRed"><?=$statCom[0] ?></span> commentaires.<br />
            L'utilisateur enregistré le plus récent est <span class="fatRed"><?= $userInfo['username'] ?></span>, le <?=$userInfo['reg_date'] ?>.<br />
            Il y a eu <span class="fatRed"><?= $compte ?></span> pages vues sur le site.<br />
            Il y a eu <span class="fatRed"><?= $compte2 ?></span> visiteurs uniques sur le site.
            </p>
        </div>
        <div>
            <p><a href="index.php">Accéder au site</a></p>
            <p><a href="admin.php?action=edition">Accéder à l'Interface d'Edition</a></p>
         </div>       
    </div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/backend/templateAdmin.php'); ?>




