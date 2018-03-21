<?php
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=rochefort;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}


// <?php
// class Manager
// {
//     protected function dbConnect()
//     {
//         $db = new PDO('mysql:host=localhost;dbname=gretaxao_florentsp4;charset=utf8', 'gretaxao_florents', 'florents2017',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//         return $db;
//     }
// }