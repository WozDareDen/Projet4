<meta charset="utf-8" />

<?php ob_start(); ?>
<!-- Barre de recherche -->
<form method="GET" action="index.php?action=search">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>


<!-- Search Results -->
<ul>
    <?php 
    while($a = $title->fetch()){
        ?>
        <li><?= htmlspecialchars($a['title']); ?></li>
    <?php
    }
    ?>
</ul>    


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('template2.php'); ?>