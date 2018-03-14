<?php
//Calling Manager
require_once('model/Manager.php');
 
//CommentsObject :
class UserManager extends Manager
{
// Vérification de la validité des informations

public function addUser($username, $pass, $mail){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $db = $this -> dbConnect(); 
    $connex = $db->prepare('INSERT INTO users(username, pass, mail, registration_date) VALUES(?,?,?,CURDATE())');
    $connex->execute(array($username, $pass_hache, $mail));
    return $connex;
}

public function verifyUser(){
    $db = $this -> dbConnect();
    $reqUser = $db->prepare("SELECT username FROM users WHERE username = ?");
    $reqUser->execute(array($_POST['username']));
    $userAlreadyExist = $reqUser->rowCount();
    return $userAlreadyExist;
}

public function userConnex(){
//  Récupération de l'utilisateur et de son pass hashé
    $db = $this -> dbConnect(); 
    $req = $db->prepare('SELECT * FROM users WHERE username = ?');
    $req->execute(array($_POST['username']));

    return $req;
    }

}