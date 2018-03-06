<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>
<!--Home Title-->
<div id="title" class="slide header">
<h1 id="titre">Billet simple pour l'Alaska</h1>
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
            <li><a href="index.php?action=post&id=<?= $data['id'] ?>">Chapitre <?=($data['id'])?> : <?= htmlspecialchars($data['title']) ?></a></li>
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
  <h2>Jean Forteroche</h2>
  <p>Comment diable un homme peut-il se réjouir d'être réveillé à 06h30 du matin par une alarme, bondir hors de son lit, avaler sans plaisir une tartine, chier, pisser, se brosser les dents et les cheveux, se débattre dans le trafic pour trouver une place, où essentiellement il produit du fric pour quelqu'un d'autre, qui en plus lui demande d'être reconnaissant pour cette opportunité ?</p>
</div>
<img src="public/images/charles5.jpg">
<img src="public/images/charles2-min.jpg">
</div>
<!--Last Chapter View (getChapterTitle, getChapterImage & getChapterExtract)-->o
<div id="slide3" class="slide">
<div class="title">
  <h2>Dernier Chapitre</h2>

  <h3><a href="#">Le diable tout le temps</a></h3>
  <p>Si quelque chose brûle votre âme avec un but et un désir, il est de votre devoir d'en être réduit en cendres. Toute autre forme d'existence sera encore un autre livre ennuyeux dans la bibliothèque de la vie. Trouvez ce que vous aimez et laissez-le vous tuer...</p>
</div>
<img id="main" src="public/images/main-min.jpg">

</div>

<div id="slide4" class="slide header toto">
  <h2>Footer.php</h2>
  
</div>

<!--template.php-->
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>