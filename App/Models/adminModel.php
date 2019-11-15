<?php

require_once('Manager.php');

/**
 * Class AdminModel
 * Model qui regroupe les fonctions liées à un utilisateur ayant les droits administrateur
 * Les fonctions sont créées mais pas encore implémentées au niveau des views
 */

class AdminModel extends Manager
{
    /**
     * @return array
     * Fonction qui permet de déterminer si un utilisateur a des droits administrateur
     */
    public function isAdmin(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_fname, use_isBanned FROM t_user WHERE use_id =' . $_SESSION['id']);
        $isAdmin = $req->fetchAll(PDO::FETCH_ASSOC);
        return $isAdmin;
    }

    /**
     * @return array
     * Fonction qui liste tous les utilisateurs inscrits (t_user)
     */
    public function allUsers(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_fname, use_isBanned FROM t_user');
        $req->execute();
        $usersInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $usersInfo;
    }

    /**
     * @return bool
     * Fonction qui permet de bannir un utilisateur
     */
    public function banUser(){
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE t_user SET use_isBanned = :isBanned WHERE use_mail = :mail');
        $ban = $req->execute([
            'isBanned' => $_POST['isBanned']
        ]);
        return $ban;
    }

    /**
     * @return array
     * Fonction qui permet de lire un message
     */
    public function readMessages(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_message');
        $req->execute();
        $messages = $req->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }

//    fonction choisir big gain
}