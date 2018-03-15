<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="public/css/move2.css" rel="stylesheet" />      

    </head>        
    <body>
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
        <input class="tpl2" id="submit" type="submit" value="GO !">
        </div>
        <div class="compte">Pas encore inscrit ? <span class="compteLien"><a href="index.php?action=subView">Créez un compte !</a></span>
        </div>                      
      </form>
      </div>
</div>
        <?= $content ?>



         <script src="public/js/jquery-3.3.1.js"></script> 
            <script src="public/js/script.js"></script> 
    </body>
</html>