<?php

require('Manager.php');

/**
 * Class UserModel
 */
session_start();
class UserModel extends Manager
{
    public function displayUsers(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_user');
        $req->execute();
        $userInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $userInfo;
    }

    public function signUp(){
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO t_user (use_mail, use_password) VALUES (:mail, :password)');
        $submit = $req->execute([
            'mail' => htmlspecialchars($_POST['mail']),
            'password' => password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT),
        ]);

        return $submit;
    }

    public function signIn(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_user WHERE use_mail = :mail');
        $req->execute([
            'mail' => htmlspecialchars($_POST['mail'])
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function displayProfile(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_password FROM t_user WHERE use_id = ' . $_SESSION['id']);
        $req->execute();
        $userProfile = $req->fetchAll(PDO::FETCH_ASSOC);

        return $userProfile;
    }
}