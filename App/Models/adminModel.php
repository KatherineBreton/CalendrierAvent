<?php

require('Manager.php');

class AdminModel extends Manager
{
    public function allUsers(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_fname, use_isBanned FROM t_user');
        $req->execute();
        $usersInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $usersInfo;
    }

//    fonction bannir un utilisateur
//    public function banUser(){}

    public function readMessages(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_message');
        $req->execute();
        $messages = $req->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }

//    fonction choisir big gain
}