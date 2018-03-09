<?php
//Calling Models :
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
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
    $commentManager = new CommentManager();

    $postAll = $chapterManager -> getAllChapters();

    // $lastChapterManager = new ChapterManager();
    $lastPost = $chapterManager -> getLastChapter();
    
    require('frontend/HomeView.php');
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