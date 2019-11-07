<?php

require('Manager.php');

/**
 * Class UserModel
 */
session_start();
class UserModel extends Manager
{
    public function signUp(){
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO t_user (use_mail, use_fname, use_password) VALUES (:mail, :fname, :password)');
        $submit = $req->execute([
            'mail' => trim(htmlspecialchars($_POST['mail'])),
            'fname' => trim(htmlspecialchars($_POST['fname'])),
            'password' => trim(password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT)),
        ]);

        return $submit;
    }

    public function signIn(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_user WHERE use_mail = :mail');
        $req->execute([
            'mail' => strtolower(trim(htmlspecialchars($_POST['mail'])))
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function displayProfile(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT use_mail, use_fname, use_password FROM t_user WHERE use_id = ' . $_SESSION['id']);
        $req->execute();
        $userProfile = $req->fetchAll(PDO::FETCH_ASSOC);

        return $userProfile;
    }

    public function writeMessage(){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO t_support (sup_title, sup_message, sup_date) VALUES (:title, :message, NOW())');
        $messageSend = $req->execute([
            'title' => $_POST['title'],
            'message' => $_POST['message']
        ]);
        return $messageSend;
    }
}