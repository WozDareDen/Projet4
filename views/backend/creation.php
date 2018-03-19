<?php $title = "Interface d'Edition" ?>
<?php ob_start(); ?>	
    <div class="main">
        <h1>Interface d'Edition</h1>
        <form class="entree commentsEdition" name="formulaire" id="formulaire" action="admin.php?action=write" method="post">
            <label  for="title">Titre du Chapitre</label>
            <input type="text" id="title" name="title" /></br>
            <label  for="chapter_number" >Numéro du Chapitre</label>
            <input type="number" id="chapter_number" name="chapter_number" /></br>
            <label  for="chapter_img">Photo du Chapitre</label>
            <input type="file" id="chapter_img" name="chapter_img" />
            <textarea id="texte" name="chapter_text" rows="30" ></textarea>
            <input type="submit" value="publier" />
        </form>
        <div id="advice" class="entree commentsEdition">
            <h2>Quelques conseils pratiques</h2>
            <dl>
                <dt>Le champ "numéro du chapitre"</dt>
                    <dd><span class="fatRed">Tous les champs doivent être renseignés</span>. Celui-ci ne fait pas exception à la règle. Une liste déroulante de numéros défile. Je n'ai pas inséré de contrainte à ce niveau. Il vous est donc théoriquement possible d'inscrire 0 ou même des nombres négatifs. Cependant une erreur apparaîtra et vous ne pourrez pas publier l'article. 
                    </dd>
                <dt>Publication</dt>
                    <dd>Vous pouvez publier vos articles de deux façons. Soit en cliquant sur la disquette en haut à gauche de l'éditeur de texte, soit en cliquant simplement sur le bouton publier en bas à gauche.
                    </dd>
            </dl>
        </div>
        <div>
            <p><a href="index.php">Accéder au site</a></p>
            <p><a href="admin.php?action=dashboard">Accéder au Tableau de Bord</a></p>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('views/backend/templateAdmin.php'); ?>