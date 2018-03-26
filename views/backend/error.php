<?php $title = "Page d'erreur" ?>
<?php ob_start(); ?>
    <div class="main">
        <h1>Ouch ! Une erreur est survenue !</h1>
        <img class="imageError" src="public/images/tete2.jpg" alt="image d'erreur" title="image d'erreur" />
        <p class="sortie" id="newOne"><?= 'Attention : '.$e->getMessage().' !'; ?></p>
        <div class="sortie">
        <p><a href="admin.php?action=dashboard">Revenir au Tableau de Bord</a></p>
    </div>
    </div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/frontend/template2.php'); ?>     