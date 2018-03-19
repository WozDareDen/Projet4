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
    $postChapter = $db->prepare('INSERT INTO chapters(title, chapter_number, chapter_img, chapter_text, chapter_date) VALUES(?,?,?,?, NOW())');
    $affectedLines = $postChapter->execute(array($title, $chapter_number, $chapter_img, $chapter_text));    
    return $postChapter;
}
//INSERT EDITED CHAPTER INTO DB
public function upDataChapter($title, $chapter_number, $chapter_img, $chapter_text, $idChapter)
{
    $chapter_img = "public/images/".$chapter_img;
    $db = $this -> dbConnect();
    $updateChapter = $db->prepare('UPDATE chapters SET title=?, chapter_number=?, chapter_img=?, chapter_text=? WHERE id= ?');
    $affectedLines = $updateChapter->execute(array($title, $chapter_number, $chapter_img, $chapter_text, $idChapter));    
    return $affectedLines;
}
//INSERT CHAPTER IN TINYMCE
public function editChapter(){
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT id, title, chapter_number, chapter_img, chapter_text FROM chapters WHERE id = ?');
    $req->execute(array($_GET['idChapter']));
    $post = $req->fetch();
    return $post;
}
//DELETE CHAPTER INTO DB
public function deleteChapter(){
    $db = $this -> dbConnect();
    $deleteChapter = $db->prepare('DELETE FROM chapters WHERE id = ?');
    $deleteChapter -> execute(array($_GET['idChapter']));
    return $deleteChapter;
}
//DELETE COMMENTS FROM DELETED CHAPTER INTO DB
public function deleteComment(){
    $db = $this -> dbConnect();
    $deleteComment = $db->prepare('DELETE FROM comments WHERE id_Chapters = ?');
    $deleteComment -> execute(array($_GET['idChapter']));
    return $deleteComment;
}
//DELETE SIGNALED COMMENT FROM DASHBOARD INTO DB
public function deleteSingleComment(){
    $db = $this -> dbConnect();
    $deleteSingleComment = $db->prepare('DELETE FROM comments WHERE id = ?');
    $deleteSingleComment -> execute(array($_GET['idComment']));
    return $deleteSingleComment;
}
//APPROVE SIGNALED COMMENT FROM DASHBOARD INTO DB
public function validComment(){
    $db = $this -> dbConnect();
    $validComment = $db->prepare('UPDATE comments SET sig = 0 WHERE id = ?');
    $validComment -> execute(array($_GET['idComment']));
    return $validComment;
}
//UPDATE SIGNAL INTO DB
public function updateSignal($signal){
    $db = $this -> dbConnect();
    $updateSignal = $db->prepare('UPDATE comments SET sig = (sig+1) WHERE id= ?');
    $updateSignal->execute(array($signal));
    return $updateSignal;
}
}