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
public function upDataChapter($title, $chapter_number, $chapter_img, $chapter_text, $idChapter)
{
    $chapter_img = "public/images/".$chapter_img;
    $db = $this -> dbConnect();
    $updateChapter = $db->prepare('UPDATE chapters SET title=?, chapter_number=?, chapter_img=?, chapter_text=? WHERE id= ?');
    $affectedLines = $updateChapter->execute(array($title, $chapter_number, $chapter_img, $chapter_text, $idChapter));
    
    return $affectedLines;
}








//EDIT CHAPTER IN TINYMCE
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

public function adminControl(){
    //  Récupération de l'utilisateur et de son pass hashé
        $db = $this -> dbConnect(); 
        $req = $db->prepare('SELECT * FROM users WHERE v = ?');
        $req->execute(array(1));
    
        return $req;
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