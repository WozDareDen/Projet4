<?php
//Calling Manager
require_once('model/Manager.php');

//ChapterObject : 
class ChapterManager extends Manager
{
//getChapter 
public function getChapter($id)
{
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT id, title, chapter_img, chapter_text, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%imin%ss\') AS chapter_date_fr FROM chapters WHERE id = ?');
    $req->execute(array($id));
    $post = $req->fetch();

    return $post;
}
public function getAllChapters()
{
    $db = $this -> dbConnect();
    $postAll = $db->query('SELECT id, title, chapter_img, chapter_text, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%imin%ss\') AS chapter_date_fr FROM chapters ORDER BY chapter_date');

    return $postAll;
}
public function getLastChapter()
{
    $db = $this -> dbConnect();
    $lastPost = $db->query('SELECT id,title, chapter_img, chapter_text FROM chapters ORDER BY id DESC LIMIT 1' );
    return $lastPost;
}


}