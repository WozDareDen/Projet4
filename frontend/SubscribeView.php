<?php $title = "Page d'inscription" ?>
<?php ob_start(); ?>
<div class="main">
    <h1>Formulaire d'inscription</h1>
    <h2>Simple et rapide !</h2>
    <p class="sortie"><span class="taille">L'inscription à ce blog est gratuite !</span> Nous insistons sur le fait que vous devez respecter les règles détaillées ci-dessous. Si vous êtes d'accord avec les règles, veuillez cocher la case « <span class="italic">J'ai lu les règles d'usage et j'accepte de les respecter</span> » et cliquez sur le bouton «<span class="italic"> S'inscrire </span>». Les messages expriment uniquement les opinions de leurs auteurs. L'Administrateur ainsi que Jean Forteroche ne sauraient être considérés comme responsables du contenu des messages dont ils ne sont pas les auteurs.</p>

<p class="sortie">En acceptant ces règles, vous vous engagez à n'écrire aucun message à caractère obscène, vulgaire, discriminatoire, menaçant, diffamatoire, injurieux ou contraire aux lois et règlements en vigueur.</p>

<p class="sortie">Vous autorisez l'Administrateur du site à supprimer, modifier, déplacer ou fermer n'importe quel message pour n'importe quelle raison et sans autorisation préalable de votre part.</p>
<p class="sortie">Ce site est excusivement à vocation pédagogique et s'inscrit dans le cadre du parcours OpenClassRooms Développeur Web Junior.</p>
<div class="sub">
                        <form action="subscribeView.php" method="post">
                                <div>
                                <label for="pseudo">Pseudo</label><br />
                                <input type="text" id="pseudo" name="username">
                                </div>
                                <div>
                                <label for="motDePasse">Mot de passe</label><br />
                                <input type="password" id="motDePasse" name="password">
                                </div>
                                <div>
                                <label for="motDePasse">Confirmation du mot de passe</label><br />
                                <input type="password" id="motDePasse" name="password">
                                </div>
                                <div>
                                <label for="mail">Adresse email</label><br />
                                <input type="text" id="mail" name="mail">
                                </div>
                                <div>
                                <input type="checkbox" name="choix" required="valid">J'ai lu les règles d'usage et j'accepte de les respecter.</br>
                                <input type="submit" value="S'inscrire" />
                                </div>
                        </form>
</div>
<div>
                        <p><a href="../index.php">Revenir à la page d'accueil</a></p>
                </div>
</div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('template2.php'); ?>                