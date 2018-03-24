<?php
session_start();
require('controller/backOffice.php');
try{   
   if (isset($_GET['action'])) {       
        
          if((isset($_POST['login']) && isset($_POST['pass'])) || (isset($_SESSION['username']) && ($_SESSION['v']==1)) ){               
            if($_GET['action'] == 'dashboard'){  
            goToDashboard();
        } 
            if($_GET['action'] == 'edition'){
                goToEdition();
            }                
            elseif($_GET['action'] == 'write'){
                $title = htmlspecialchars($_POST['title']);
                $chapter_number = htmlspecialchars($_POST['chapter_number']);
                $chapter_img = htmlspecialchars($_POST['chapter_img']);
                $chapter_text = ($_POST['chapter_text']);
                if(!empty($title) && !empty($chapter_number) && !empty($chapter_img) && !empty($chapter_text)){
                    if($chapter_number > 0){
                        pushChapter($title,$chapter_number,$chapter_img,$chapter_text);
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
                $title = htmlspecialchars($_POST['title']);
                $chapter_number = htmlspecialchars($_POST['chapter_number']);
                $chapter_img = htmlspecialchars($_POST['chapter_img']);
                $chapter_text = ($_POST['chapter_text']);
                $idChapter = htmlspecialchars($_POST['idChapter']);
                if(!empty($title) && !empty($chapter_number) && !empty($chapter_img) && !empty($chapter_text)){
                    if($chapter_number > 0){
                        updateChapter($title,$chapter_number,$chapter_img,$chapter_text,$idChapter);
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




