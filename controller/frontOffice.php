<?php
//Calling Models :
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/AdminManager.php');
// HOME VIEW
function setAllChapters()
{
    $chapterManager = new ChapterManager();
    $postAll = $chapterManager -> getAllChapters();
    // $lastChapterManager = new ChapterManager();
    $lastPost = $chapterManager -> getLastChapter();    
    require('views/frontend/HomeView.php');
}
// CHAPTER VIEW 
function setChapter($id)
{
    $chapterManager = new ChapterManager();
    $commentManager = new CommentManager();
    $post = $chapterManager -> getChapter($id);
    $comments = $commentManager -> getChapterComments($_GET['id']);
    require('views/frontend/ChapterView.php');
}
// SUBSCRIBEVIEW
function subView(){
    require('views/frontend/SubscribeView.php');
}
// GET COMMENTS TO DB & CHAPTERVIEW
function addComment($id_Chapters, $id_Users, $comment_text)
{
    $commentManager = new CommentManager();
    $comments = $commentManager -> postChapterComment($id_Chapters, $id_Users, $comment_text);
    if ($comments === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id_Chapters . '#comments');
    }
}    
// GET SIGNAL TO DB & CHAPTERVIEW
function addSignal($commentId,$chapterId){
    $commentSignal = new AdminManager();
    $updateSignal = $commentSignal -> updateSignal($commentId);
    header('Location:index.php?action=post&id='.$chapterId.'#comments');
}
//LOGIN FUNCTION
function connected(){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $userManager = new UserManager();
    $req = $userManager -> userConnex($username);
    $resultat = $req->fetch();
    $isPasswordCorrect = password_verify($_POST['pass'],$resultat['pass']);
        if($isPasswordCorrect && $resultat['v'] == 1){
            $_SESSION['username'] =  $resultat['username'];
            $_SESSION['id'] =  $resultat['id'];
            header('Location: admin.php?action=dashboard');
        }
        elseif($isPasswordCorrect){
            $_SESSION['username'] =  $resultat['username'];
            $_SESSION['id'] =  $resultat['id'];
            header('Location: index.php');             
          }
        else{
            throw new Exception('vos identifiants sont incorrects');
        }
}    
//LOGOUT FUNCTION
function disconnected(){
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}
//USER CONTROLS BEFORE DB & NEWUSER
function sameUser(){
    $userManager = new UserManager();
    $resultat = $userManager -> verifyUser();
    if($resultat == 0){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $_POST['pass'])){
            if(preg_match("#^\w{3,25}$#",$_POST['username'])){           
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
// GET USER TO DB & HOMEVIEW
function newUser($username, $pass, $mail)
{
    $userManager = new UserManager();
    $connex = $userManager -> addUser($username, $pass, $mail);
    header('Location: index.php');
}