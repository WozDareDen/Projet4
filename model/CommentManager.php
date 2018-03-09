<?php
//Calling Manager
require_once('model/Manager.php');
 
//CommentsObject :
class CommentManager extends Manager
{
//getChapterComments(chapter_id) 
public function getChapterComments($id_Chapters)
{
    $db = $this -> dbConnect();
    $comments = $db->prepare('SELECT username, comment_text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments INNER JOIN users WHERE comments.id_Chapters=? && users.id = comments.id_Users ORDER BY comment_date DESC ');
    $comments->execute(array($id_Chapters));

    return $comments;
}
//PostChapterComment
public function postChapterComment($id_Chapters, $id_Users, $comment_text)
{
    $db = $this -> dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id_Chapters, id_Users, comment_text, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($id_Chapters, $id_Users, $comment_text));
    return $affectedLines;
}
}