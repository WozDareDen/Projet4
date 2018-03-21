<?php
//Calling Models :
require('model/ChapterManager.php');
require('model/CommentManager.php');
require('model/UserManager.php');
require('model/AdminManager.php');
// GO TO DASHBOARD from Login or already login
function goToDashboard(){
    $chapterManager = new ChapterManager();
    $postAll = $chapterManager ->getAllChapters();
    $commentManager = new CommentManager();
    $comAll = $commentManager ->printComment();
    $comStats = $commentManager ->commentStats();
    $userManager = new UserManager();
    $userInfos = $userManager ->lastStatUser();
    $useAll = $userManager ->userStats();
    require('views/backend/dashboard.php');
}
// GET CHAPTER TO MODEL & DASHBOARD
function pushChapter($title, $chapter_number,$chapter_img, $chapter_text){
    $adminManager = new AdminManager();
    $postChapter = $adminManager -> postChapter($title, $chapter_number,$chapter_img, $chapter_text);
    header('Location: admin.php?action=dashboard');
}
// UPDATE CHAPTER TO MODEL & DASHBOARD
function updateChapter($title, $chapter_number,$chapter_img, $chapter_text, $idChapter){
    $adminManager = new AdminManager();
    $updateChapter = $adminManager -> UpDataChapter($title, $chapter_number,$chapter_img, $chapter_text,$idChapter);
    header('Location: admin.php?action=dashboard');
}
// DELETE CHAPTER TO MODEL & dashboard
function theEraser(){
    $idChapter = $_GET['idChapter'];    
    $adminManager = new AdminManager();
    $deleteComment = $adminManager -> deleteComment($idChapter); 
    $deleteChapter = $adminManager -> deleteChapter($idChapter);
    header('Location: admin.php?action=dashboard');
}
// GO TO EDITION
function goToEdition(){
    require('views/backend/creation.php');
}
// GET CHAPTER TO MODEL & EDITION
function theEditor(){
    $idChapter = $_GET['idChapter'];
    $adminManager = new AdminManager();
    $post = $adminManager -> editChapter($idChapter);
    require('views/backend/edition.php');
}
// DELETE COMMENT FROM CHAPTER TO MODEL & dashboard
function forgetCom(){
    $idComment = $_GET['idComment'];
    $adminManager = new AdminManager();
    $deleteSingleComment = $adminManager -> deleteSingleComment($idComment);
    header('Location: admin.php?action=dashboard');
}
// APPROVE COMMENT FROM CHAPTER TO MODEL & dashboard
function validCom(){
    $idComment = $_GET['idComment'];
    $adminManager = new AdminManager();
    $validComment = $adminManager->validComment($idComment);
    header('Location: admin.php?action=dashboard');
}