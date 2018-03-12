<?php
//Calling Manager
require_once('model/Manager.php');
 
//CommentsObject :
class AdminManager extends Manager
{
//PostChapterComment
public function postChapter($title, $chapter_number, $chapter_img, $chapter_text)
{
    $chapter_img = "public/images/".$chapter_img;
    $db = $this -> dbConnect();
    $postChapter = $db->prepare('INSERT INTO chapters(title, chapter_number, chapter_img, chapter_text, chapter_date) VALUES(?,?,?,?, CURDATE())');
    $affectedLines = $postChapter->execute(array($title, $chapter_number, $chapter_img, $chapter_text));
    
    return $postChapter;
}
}