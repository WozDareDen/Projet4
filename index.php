<?php
session_start();
require('controller/frontOffice.php');
try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post') {
            $id = htmlspecialchars($_GET['id']);
            if (isset($id) && $id > 0) {                
                setChapter($id);
            }
            else {
                throw new Exception('aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'signal'){
            $commentId = htmlspecialchars($_GET['id']);
            $chapterId = htmlspecialchars($_GET['idChapter']);
            addSignal($commentId,$chapterId);
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_Chapters = htmlspecialchars($_GET['id']); 
                $id_Users = htmlspecialchars($_POST['id_Users']);
                $comment_text = htmlspecialchars($_POST['comment_text']);
                if (!empty($id_Users) && !empty($comment_text)) {
                    addComment($id_Chapters, $id_Users, $comment_text);
                }
                else {
                    throw new Exception('tous les champs ne sont pas remplis');
                }
            }
            else {
                throw new Exception('vous devez être connecté');
            }
        }
        elseif ($_GET['action'] == 'subView'){
            subView();            
        }
        elseif ($_GET['action'] == 'addUser'){
            $username = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['pass']);
            $pass2 = htmlspecialchars($_POST['pass2']);
            $mail = htmlspecialchars($_POST['mail']);
            if(strlen($username) <= 20 ){
                if($pass == $pass2){
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){                        
                        sameUser($username, $pass, $mail);                        
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
            $username = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['pass']);
            if(isset($username) && isset($pass)){
                    connected($username,$pass);
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