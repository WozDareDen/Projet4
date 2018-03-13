<?php $title = 'Accueil'; 
?>
<?php ob_start(); ?>
<!--Home Title-->
<div id="title" class="slide">
<h1 id="titre">Billet simple pour l'Alaska</h1>
<div class="title2">
<p>Bienvenue sur le blog de l'acteur et écrivain <span class="JF">Jean Forteroche</span>. Il travaille actuellement sur son prochain roman. Dans la grande tradition des romans-feuilleton du XIXème siècle et à l'instar du maître du fantastique Stephen King avec La Ligne Verte, il souhaite publier sa dernière oeuvre par épisodes. Il se positionne en feuilletoniste du XXIème siècle et souhaite, à travers les possibilité offertes par le web dont découlent les nouveaux usages de lecture, se rapprocher de ses lecteurs, rompant ainsi la distance d'un auteur avec son public. 
</p>
</div>
<div id="identify">
  <button class="identifyB">s'identifier</button>
<div class="register">
<div class="close">X</div>
<form action="index.php?action=record" method="post">

                                <div>
                                <label for="username">Pseudo</label><br />
                                <input type="text" id="username" name="username" placeholder="entrez votre pseudo">
                                </div>
                                <div>
                                <label for="pass">Mot de passe</label><br />
                                <input type="password" id="pass" name="pass" placeholder="et votre mot de passe">
                                </div>
                                <div>
                                <input id="submit" type="submit" value="GO !">
                                </div>
                                <div class="compte">Pas encore inscrit ? <span class="compteLien"><a href="index.php?action=subView">Créez un compte !</a></span>
                                </div>
                        </form>
</div>


</div>
</div>

<div id="slide1" class="slide">
<div class="title">
<!--Chapters Titles List (getChapterTitlesList)-->   
  <h2>Roman-feuilleton</h2>
  <h3>Accès direct aux chapitres</h3>
  <p class="menuLatéral">
        <ul class="menuChapitre">
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
    </p>
  
</div>

</div>

<div id="slide2" class="slide">
<div class="title">
  <h2>Qui es-tu Jean Forteroche ?</h2>
  <p>Comment diable un homme peut-il se réjouir d'être réveillé à 06h30 du matin par une alarme, bondir hors de son lit, avaler sans plaisir une tartine, chier, pisser, se brosser les dents et les cheveux, se débattre dans le trafic pour trouver une place, où essentiellement il produit du fric pour quelqu'un d'autre, qui en plus lui demande d'être reconnaissant pour cette opportunité ?</p>
</div>
<img src="public/images/charles5.jpg">
<img src="public/images/charles2-min.jpg">
</div>
<!--Last Chapter View (getChapterTitle, getChapterImage & getChapterExtract)-->
<div id="slide3" class="slide">
<div class="title">
  <h2>Dernier Chapitre</h2>
  <?php 
$lastData = $lastPost->fetch();

?>
  <h3><a href="index.php?action=post&id=<?= $lastData['id'] ?>"><?= htmlspecialchars($lastData['title']) ?></a></h3>
  <p><?= substr($lastData['chapter_text'],0,263);
?>...</p>
</div>
<img id="main" src="<?= htmlspecialchars($lastData['chapter_img']) ?>" alt="illustration du chapitre" title="photo n&b"/>
<?php


$lastPost->closeCursor(); 
?>
</div>


<!--template.php-->
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>