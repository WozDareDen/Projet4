<?php
session_start();
require('controller/backOffice.php');
try{   
   if (isset($_GET['action'])) {                
          if((isset($_POST['login']) && isset($_POST['pass'])) || (isset($_SESSION['username']) && ($_SESSION['id']==26)) ){               
            if($_GET['action'] == 'dashboard'){
            goToDashboard();
        } 
            if($_GET['action'] == 'edition'){
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
            elseif($_GET['action'] == 'update'){ 
                if(!empty($_POST['title']) && !empty($_POST['chapter_number']) && !empty($_POST['chapter_img']) && !empty($_POST['chapter_text'])){
                    if($_POST['chapter_number'] > 0){
                        updateChapter($_POST['title'],$_POST['chapter_number'],$_POST['chapter_img'],$_POST['chapter_text'],$_POST['idChapter']);
                    }
                    else{
                        throw new Exception('Le numéro de chapitre doit être positif');
                    }
                }
                else{
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            elseif(isset($_GET['action']) && isset($_GET['idChapter'])){
                if($_GET['action'] == 'delete'){
                    theEraser();
                }
                if($_GET['action'] == 'edit'){
                    theEditor();
                }
                else{
                    throw new Exception('bien tenté !');
                }
            }
            elseif(isset($_GET['action']) && isset($_GET['idComment'])){
                if($_GET['action'] == 'deleteCom'){
                    forgetCom();
                }
                elseif($_GET['action'] == 'approval'){
                    validCom();
                }
            }
        }
        else{
            throw new Exception('vous n\'êtes pas Admin');
        }        
    }
    else{
        throw new Exception('cette page n\'existe pas');
    }  
    }
catch(Exception $e){
    require('views/backend/error.php');
}




