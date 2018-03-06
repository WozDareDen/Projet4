<?php
//Routeur require Controller 
require('controller/controller.php');
// //gestion des erreurs
try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                setChapter($_GET['id']);
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['id_Users']) && !empty($_POST['comment_text'])) {
                    addComment($_GET['id'], $_POST['id_Users'], $_POST['comment_text']);
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }   
    }
    else {
        setAllChapters();
    }
    }
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}