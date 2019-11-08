<?php

require_once('Manager.php');

class AdminModel extends Manager
{
    public function isAdmin(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_fname, use_isBanned FROM t_user WHERE use_id =' . $_SESSION['id']);
        $isAdmin = $req->fetchAll(PDO::FETCH_ASSOC);
        return $isAdmin;
    }

    public function allUsers(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_fname, use_isBanned FROM t_user');
        $req->execute();
        $usersInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $usersInfo;
    }

//    fonction bannir un utilisateur
    public function banUser(){
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE t_user SET use_isBanned = :isBanned WHERE use_mail = :mail');
        $ban = $req->execute([
            'isBanned' => $_POST['isBanned']
        ]);
        return $ban;
    }

    public function readMessages(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_message');
        $req->execute();
        $messages = $req->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }

//    fonction choisir big gain
}