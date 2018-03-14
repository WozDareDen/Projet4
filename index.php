<?php
session_start();

//Routeur require Controller 
require('controller/frontOffice.php');

// //gestion des erreurs
try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                setChapter($_GET['id']);
            }
            else {
                throw new Exception('aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['id_Users']) && !empty($_POST['comment_text'])) {
                    addComment($_GET['id'], $_POST['id_Users'], $_POST['comment_text']);
                }
                else {
                    throw new Exception('tous les champs ne sont pas remplis');
                }
            }
            else {
                throw new Exception('aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'subView'){
            subView();            
        }

        elseif ($_GET['action'] == 'addUser'){
            if(strlen(htmlspecialchars($_POST['username'])) <= 25 ){
                if(htmlspecialchars($_POST['pass']) == htmlspecialchars($_POST['pass2'])){
                    if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){                        
                        sameUser();                        
                    }
                    else{
                        throw new Exception('votre adresse mail n\'est pas valide');
                    }                    
                }
                else{
                    throw new Exception('vos mots de passes ne sont pas identiques');
                }
            }
            else{
                throw new Exception('votre pseudo dépasse les 25 caractères');
            }
        }
        elseif($_GET['action'] == 'deco'){
            disconnected();
        }
        elseif ($_GET['action'] == 'record'){
            if(isset($_POST['username']) && isset($_POST['pass'])){
                    connected();
            }
            else{
                    throw new Exception('veuillez renseignez vos identifiants');
            }    
        }        

    }
    else {
        setAllChapters();
    }
    }
catch(Exception $e){
    require('views/frontend/error.php');
}