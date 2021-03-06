<?php
//Calling Manager
require_once('model/Manager.php');

//ChapterObject : 
class ChapterManager extends Manager
{
//SINGLE CHAPTER DATA 
public function getChapter($id)
{
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT id, title, chapter_number, chapter_img, chapter_text, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%imin\') AS chapter_date_fr FROM chapters WHERE id = ? && statut=1');
    $req->execute(array($id));
    $post = $req->fetch();
    return $post;
}
// ALL CHAPTERS DATA
public function getAllChapters()
{
    $db = $this -> dbConnect();
    $postAll = $db->query('SELECT id, title, chapter_number, chapter_img, chapter_text, statut, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%imin\') AS chapter_date_fr FROM chapters WHERE statut=1 ORDER BY chapter_number DESC');
    return $postAll;
}
// LAST CHAPTER DATA
public function getLastChapter()
{
    $db = $this -> dbConnect();
    $lastPost = $db->query('SELECT * FROM chapters WHERE statut=1 ORDER BY chapter_number DESC LIMIT 1 ' );  
    return $lastPost;
}
}