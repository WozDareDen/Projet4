<?php

//Calling Models :
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/AdminManager.php');

// GO TO EDITION
function goToEdition(){
    require('views/backend/edition.php');
}
// GO TO PANNEL
function goToPannel(){
    $chapterManager = new ChapterManager();
    $postAll = $chapterManager ->getAllChapters();
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
function theEraser(){
    $adminManager = new AdminManager();
    $deleteChapter = $adminManager -> deleteChapter();
    header('Location: admin.php?action=pannel');
}
