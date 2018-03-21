<?php $title = "Page d'inscription" ?>
<?php ob_start(); ?>
<div class="main">
<!--SUB FORM-->        
        <h1>Formulaire d'inscription</h1>
        <h2>Simple et rapide !</h2>
        <p class="sortie"><span class="taille">L'inscription à ce blog est gratuite !</span> Nous insistons sur le fait que vous devez respecter les règles détaillées ci-dessous. Si vous êtes d'accord avec les règles, veuillez cocher la case « <span class="italic">J'ai lu les règles d'usage et j'accepte de les respecter</span> » et cliquez sur le bouton «<span class="italic"> S'inscrire </span>». Les messages expriment uniquement les opinions de leurs auteurs. L'Administrateur ainsi que Jean Forteroche ne sauraient être considérés comme responsables du contenu des messages dont ils ne sont pas les auteurs.</p>
        <p class="sortie">En acceptant ces règles, vous vous engagez à n'écrire aucun message à caractère obscène, vulgaire, discriminatoire, menaçant, diffamatoire, injurieux ou contraire aux lois et règlements en vigueur.</p>
        <p class="sortie">Vous autorisez l'Administrateur du site à supprimer, modifier, déplacer ou fermer n'importe quel message pour n'importe quelle raison et sans autorisation préalable de votre part.</p>
        <p class="sortie"><span class="taille">Quelques consignes pour valider l'inscription !</span> Votre pseudo doit être composé entre 3 et 20 caractères alphanumériques et votre mot de passe doit être composé entre 8 et 16 caractères alphanumériques comprenant au minimum 1 majuscule, 1 minuscule et 1 chiffre.</p>
        <p class="sortie">Ce site est excusivement à vocation pédagogique et s'inscrit dans le cadre du parcours OpenClassRooms Développeur Web Junior.</p>
        <div class="sub">
                <form action="index.php?action=addUser" method="post">
                        <div>
                        <label for="username">Pseudo</label><br />
                        <input type="text" id="username" name="username" required="valid" placeholder="choisissez votre pseudo" > 
                        </div>
                        <div>
                        <label for="pass">Mot de passe</label><br />
                        <input type="password" id="pass" name="pass" required="valid" placeholder="choisissez votre mot de passe">
                        </div>
                        <div>
                        <label for="pass2">Confirmation du mot de passe</label><br />
                        <input type="password" id="pass2" name="pass2" required="valid" placeholder="confirmez votre mot de passe">
                        </div>
                        <div>
                        <label for="mail">Adresse email</label><br />
                        <input type="text" id="mail" name="mail" required="valid" placeholder="renseignez votre email" >
                        </div>
                        <div>
                        <input type="checkbox" name="choix" required="valid"> J'ai lu les règles d'usage et j'accepte de les respecter.</br>
                        <input type="submit" name="addUser" value="S'inscrire" />
                        </div>
                </form>
        </div>
        <div>
                <p><a href="index.php">Revenir à la page d'accueil</a></p>
        </div>
</div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('template2.php'); ?>                