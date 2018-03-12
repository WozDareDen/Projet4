<?php
//Calling Models :
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/AdminManager.php');
//Require Views :
function setChapter($id)
{
    $chapterManager = new ChapterManager();
    $commentManager = new CommentManager();
    $post = $chapterManager -> getChapter($id);
    $comments = $commentManager -> getChapterComments($_GET['id']);
    require('frontend/ChapterView.php');
}

function setAllChapters()
{
    $chapterManager = new ChapterManager();
    $postAll = $chapterManager -> getAllChapters();
    // $lastChapterManager = new ChapterManager();
    $lastPost = $chapterManager -> getLastChapter();    
    require('frontend/HomeView.php');
}

function pushChapter($title, $chapter_number,$chapter_img, $chapter_text){
    $adminManager = new AdminManager();
    $postChapter = $adminManager -> postChapter($title, $chapter_number,$chapter_img, $chapter_text);
    header('Location:index.php');
}

function addComment($id_Chapters, $id_Users, $comment_text)
{
    $commentManager = new CommentManager();
    $comments = $commentManager -> postChapterComment($id_Chapters, $id_Users, $comment_text);
    if ($comments === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id_Chapters);
    }
}    

function subView(){
    require('frontend/SubscribeView.php');
}

function newUser($username, $pass, $mail)
{
    $userManager = new UserManager();
    $connex = $userManager -> addUser($username, $pass, $mail);
    header('Location: index.php');
}

function connected($username,$pass){
    $userManager = new UserManager();
    $keepIt = $userManager-> userConnex($username,$pass);
    require('index.php');
}
function sameUser(){
    $userManager = new UserManager();
    $resultat = $userManager -> verifyUser();
    if($resultat == 0){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $_POST['pass'])){
            if(preg_match("/[a-zA-Z0-9]{3,25}/",$_POST['username'])){           
            newUser($_POST['username'], $_POST['pass'], $_POST['mail']);
            }   
            else{
                throw new Exception('votre pseudo ne doit compter que des lettres ou des chiffres au nombre de 3 minimum');
            }
        }
        else{
            throw new Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
        }
    }
    else{
        throw new Exception('ce pseudo existe déjà');
    }
}