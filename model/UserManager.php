<?php
//Calling Manager
require_once('model/Manager.php');
//CommentsObject :
class UserManager extends Manager
{
// SAME USERNAME CONTROL
public function verifyUser(){
    $db = $this -> dbConnect();
    $reqUser = $db->prepare("SELECT username FROM users WHERE username = ?");
    $reqUser->execute(array($_POST['username']));
    $userAlreadyExist = $reqUser->rowCount();
    return $userAlreadyExist;
    }
// USER CONNECTION CONTROL
public function userConnex($username){
    $db = $this -> dbConnect(); 
    $req = $db->prepare('SELECT * FROM users WHERE username = ?');
    $req->execute(array($username));
    return $req;
    }
// ADD NEW USER
public function addUser($username, $pass, $mail){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $db = $this -> dbConnect(); 
    $connex = $db->prepare('INSERT INTO users(username, pass, mail, registration_date) VALUES(?,?,?,CURDATE())');
    $connex->execute(array($username, $pass_hache, $mail));
    return $connex;
    }
public function userStats(){
    $db = $this -> dbconnect();
    $useAll = $db->query('SELECT COUNT(*) FROM users');
    return $useAll;
}
public function lastStatUser(){
    $db = $this -> dbConnect();
    $userInfos = $db->query('SELECT id, username, DATE_FORMAT(registration_date,\'%d\.%m\.%Y\') AS reg_date FROM users WHERE id IN(select MAX(id) FROM users)');
    return $userInfos;
}
}