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
// GO TO DASHBOARD from Login or already login
function goToDashboard(){
    $chapterManager = new ChapterManager();
    $postAll = $chapterManager ->getAllChapters();
    $commentManager = new CommentManager();
    $comAll = $commentManager ->printComment();
    require('views/backend/dashboard.php');
}
// DEFAULT LOGIN PAGE
function goGetLost(){
    require('views/backend/login.php');
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
    $adminManager = new AdminManager();
    $deleteComment = $adminManager -> deleteComment(); 
    $deleteChapter = $adminManager -> deleteChapter();
    header('Location: admin.php?action=dashboard');
}
// GET CHAPTER TO MODEL & EDITION
function theEditor(){
    $adminManager = new AdminManager();
    $post = $adminManager -> editChapter();
    require('views/backend/edition.php');
}
// DELETE COMMENT FROM CHAPTER TO MODEL & dashboard
function forgetCom(){
    $adminManager = new AdminManager();
    $deleteSingleComment = $adminManager -> deleteSingleComment();
    header('Location: admin.php?action=dashboard');
}
// APPROVE COMMENT FROM CHAPTER TO MODEL & dashboard
function validCom(){
    $adminManager = new AdminManager();
    $validComment = $adminManager->validComment();
    header('Location: admin.php?action=dashboard');
}