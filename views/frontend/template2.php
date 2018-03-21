<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Blog du romancier Jean Forteroche" />
        <meta name="keywords" content="Jean Forteroche, ecrivain, blog, roman, Alaska" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Blog du romancier Jean Forteroche" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="JeanForteroche.fr" />
        <meta property="og:description" content="Blog du romancier Jean Forteroche" />
        <meta property="og:image" content="public/images/charlesfav.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Blog du romancier Jean Forteroche" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:description" content="Blog du romancier Jean Forteroche" />
        <meta name="twitter:image" content="public/images/charlesfav.png" />
        <title><?= $title ?></title>
        <link href="public/css/move2.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="public/images/charlesfav.png" />    
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