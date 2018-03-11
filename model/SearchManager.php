<?php
//Calling Manager
require_once('model/Manager.php');
 
//CommentsObject :
class SearchManager extends Manager{
    public function search(){
        $db = $this -> dbConnect(); 
        $q = $db->query('SELECT title FROM chapters ORDER BY id DESC');
        return $q;
    }
}