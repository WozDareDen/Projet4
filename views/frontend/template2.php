<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="public/css/move2.css" rel="stylesheet" />     
</head>        
<body>
    <div id="identify">
<?php
if(empty($_SESSION['username'])){
?>
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
                <input class="tpl2" id="submit" type="submit" value="GO !">
                </div>
                <div class="compte">Pas encore inscrit ? <span class="compteLien"><a href="index.php?action=subView">Créez un compte !</a></span>
                </div>                      
            </form>
        </div>
<?php
} 
else{
?>
        <a href="index.php?action=deco"><button class="identifyB">Déconnexion</button></a>
<?php 
}
?>  
    </div>
    <?= $content ?>
    <script src="public/js/jquery-3.3.1.js"></script> 
    <script src="public/js/script.js"></script> 
</body>
</html>