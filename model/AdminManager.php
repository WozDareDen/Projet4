<?php
//Calling Manager
require_once('model/Manager.php');
 
//CommentsObject :
class AdminManager extends Manager
{
//INSERT CHAPTER INTO DB
public function postChapter($title, $chapter_number, $chapter_img, $chapter_text)
{
    $chapter_img = "public/images/".$chapter_img;
    $db = $this -> dbConnect();
    $postChapter = $db->prepare('INSERT INTO chapters(title, chapter_number, chapter_img, chapter_text, chapter_date) VALUES(?,?,?,?, CURDATE())');
    $affectedLines = $postChapter->execute(array($title, $chapter_number, $chapter_img, $chapter_text));
    
    return $postChapter;
}

//DELETE CHAPTER INTO DB
public function deleteChapter(){
    $db = $this -> dbConnect();
    $deleteChapter = $db->prepare('DELETE FROM chapters WHERE id = ?');
    $deleteChapter -> execute(array($_GET['idChapter']));
    return $deleteChapter;
}

//GET SIGNAL INTO DB
// public function getSignal(){
//     $db = $this -> dbConnect();
//     $signal = $db->prepare('UPDATE comments SET signal = +1 WHERE signal = ?');
//     $signal -> execute(array($_GET['signal']));
//     return $signal;
// }







// UPDATE SIGNAL INTO DB
// public function updateSignal($signal){
//     $db = $this -> dbConnect();
//     $updateSignal = $db->prepare('UPDATE comments SET signal WHERE id= id_chapters');
//     $updateSignal->execute(array($signal));
//     return $updateSignal;
// }
}