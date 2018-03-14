<?php
session_start();
require('controller/backOffice.php');
try{
    if(isset($_GET['action']) && isset($_GET['idChapter'])){
        if($_GET['action'] == 'delete'){
            theEraser();
        }
    }

    elseif (isset($_GET['action'])) {
       
        if($_GET['action'] == 'admin'){
            if(isset($_GET['admin']) && isset($_GET['pass'])){
                goGetLost();
            }
            else{
                echo 'shit';
            }
        }
        elseif($_GET['action'] == 'edition'){
            goToEdition();
        }
        elseif($_GET['action'] == 'write'){
            if(!empty($_POST['title']) && !empty($_POST['chapter_number']) && !empty($_POST['chapter_img']) && !empty($_POST['chapter_text'])){
                if($_POST['chapter_number'] > 0){
                    pushChapter($_POST['title'],$_POST['chapter_number'],$_POST['chapter_img'],$_POST['chapter_text']);
                }
                else{
                    throw new Exception('Le numéro de chapitre doit être positif');
                }
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        elseif($_GET['action'] == 'pannel'){
            goToPannel();
        }
       
        else{
            echo 'banane';
        }
    }
    else{
        goGetLost();
    }
    
        
    }

catch(Exception $e){
    require('../frontend/error.php');
}




