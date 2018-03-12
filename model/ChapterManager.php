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
    $req = $db->prepare('SELECT id, title, chapter_number, chapter_img, chapter_text, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%imin\') AS chapter_date_fr FROM chapters WHERE id = ?');
    $req->execute(array($id));
    $post = $req->fetch();

    return $post;
}
public function getAllChapters()
{
    $db = $this -> dbConnect();
    $postAll = $db->query('SELECT id, title, chapter_number, chapter_img, chapter_text, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%imin\') AS chapter_date_fr FROM chapters ORDER BY chapter_number DESC');

    return $postAll;
}
public function getLastChapter()
{
    $db = $this -> dbConnect();
    $lastPost = $db->query('SELECT id,title, chapter_number, chapter_img, chapter_text FROM chapters WHERE chapter_number IN (select MAX(chapter_number) FROM chapters)' );
    
    return $lastPost;
}


}