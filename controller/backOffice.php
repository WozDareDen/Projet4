<?php

//Calling Models :
require('model/ChapterManager.php');
require('model/CommentManager.php');
require('model/UserManager.php');
require('model/AdminManager.php');

// GO TO EDITION
function goToEdition(){
    require('views/backend/creation.php');
}
// GO TO PANNEL from Login or already login
function goToPannel(){
    if(isset($_POST['login']) && isset($_POST['pass'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $userManager = new AdminManager();
    $req = $userManager -> adminControl();
    $resultat = $req->fetch();
    $isPasswordCorrect = password_verify($pass,$resultat['pass']);
        if($isPasswordCorrect){
            $_SESSION['username'] =  $resultat['username'];
            $_SESSION['id'] =  $resultat['id'];
        }
        else{
            throw new Exception('vos identifiants sont incorrects');
        }  
    }   
    $chapterManager = new ChapterManager();
    $postAll = $chapterManager ->getAllChapters();
    $commentManager = new CommentManager();
    $comAll = $commentManager ->printComment();
    require('views/backend/pannel.php');
}
function goGetLost(){
    require('views/backend/login.php');
}
// GET CHAPTER TO MODEL & HOMEVIEW
function pushChapter($title, $chapter_number,$chapter_img, $chapter_text){
    $adminManager = new AdminManager();
    $postChapter = $adminManager -> postChapter($title, $chapter_number,$chapter_img, $chapter_text);
    header('Location: admin.php?action=pannel');
}
function updateChapter($title, $chapter_number,$chapter_img, $chapter_text, $idChapter){
    $adminManager = new AdminManager();
    $updateChapter = $adminManager -> UpDataChapter($title, $chapter_number,$chapter_img, $chapter_text,$idChapter);
    header('Location: admin.php?action=pannel');
}
function theEraser(){
    $adminManager = new AdminManager();
    $deleteComment = $adminManager -> deleteComment(); 
    $deleteChapter = $adminManager -> deleteChapter();
    header('Location: admin.php?action=pannel');
}
function theEditor(){
    $adminManager = new AdminManager();
    $post = $adminManager -> editChapter();
    require('views/backend/edition.php');
}
function forgetCom(){
    $adminManager = new AdminManager();
    $deleteSingleComment = $adminManager -> deleteSingleComment();
    header('Location: admin.php?action=pannel');
}
function validCom(){
    $adminManager = new AdminManager();
    $validComment = $adminManager->validComment();
    header('Location: admin.php?action=pannel');
}