<?php
//Calling Manager
require_once('model/Manager.php');
//CommentsObject :
class CommentManager extends Manager
{
//COMMENTS FROM CHAPTER
public function getChapterComments($id_Chapters)
{
    $db = $this -> dbConnect();
    $comments = $db->prepare('SELECT comments.id, username, comment_text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments INNER JOIN users WHERE comments.id_Chapters=? && users.id = comments.id_Users ORDER BY comment_date DESC ');
    $comments->execute(array($id_Chapters));
    return $comments;
}
//POST COMMENTS
public function postChapterComment($id_Chapters, $id_Users, $comment_text)
{
    $db = $this -> dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id_Chapters, id_Users, comment_text, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($id_Chapters, $id_Users, $comment_text));
    return $affectedLines;
}
//POST SIGNAL COMMENTS IN DASHBOARD
public function printComment(){
    $db = $this -> dbConnect();
    $comAll = $db->query('SELECT comments.id, chapter_number, id_Chapters, sig, comment_text, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_short FROM comments INNER JOIN chapters WHERE sig >2 && id_Chapters = chapters.id ORDER BY sig DESC');
    return $comAll;
}
public function commentStats(){
    $db = $this -> dbConnect();
    $comStats = $db->query('SELECT COUNT(*) FROM comments');
    return $comStats;
}
}