<?php $title = "Interface de connexion" ?>

    <div class="main">
        <h1>Connexion</h1>
        <form class="entree commentsEdition" action="admin.php?action=pannel" method="post">
        <input type="text" placeholder="entrez votre identifiant" name="login" id="admin" required="valid"/>
        <input type="password" placeholder="entrez votre mot de passe" name="pass" id="pass" required="valid"/></br>
        <input type="submit" value="valider" />
        </form>
    </div>
    <?php ob_start(); ?>	


    
    
    

    <?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/backend/templateAdmin.php'); ?>    