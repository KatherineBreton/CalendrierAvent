<?php

require_once('Manager.php');

/**
 * Class UserModel
 */
class UserModel extends Manager
{
    /**
     * @return bool
     * Fonction qui inscrit en base de données un nouvel utilisateur
     * La requête SQL ne fonctionne que si le mail n'est pas déjà existant en base, pour éviter les doubles comptes
     * (Le champ use_mail doit avoir une clé unique)
     */
    public function signUp(){
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT IGNORE INTO t_user (use_mail, use_fname, use_password, use_date) VALUES (:mail, :fname, :password, NOW())');
        $submit = $req->execute([
            'mail' => trim(htmlspecialchars($_POST['mail'])),
            'fname' => trim(htmlspecialchars($_POST['fname'])),
            'password' => trim(password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT)),
        ]);

        return $submit;
    }

    /**
     * @return array
     * Fonction qui lit en base de données pour permettre la connexion d'un utilisateur enregistré
     */
    public function signIn(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_user WHERE use_mail = :mail');
        $req->execute([
            'mail' => strtolower(trim(htmlspecialchars($_POST['mail'])))
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    /**
     * @return array
     * Fonction qui permet d'afficher les informations d'un utilisateur
     */
    public function displayProfile(){
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT use_mail, use_fname, use_password, DATE_FORMAT(use_date, '%d/%m/%Y') AS use_dateFR FROM t_user WHERE use_id = " . $_SESSION['id']);
        $req->execute();
        $userProfile = $req->fetchAll(PDO::FETCH_ASSOC);

        return $userProfile;
    }

    /**
     * @return bool
     * Fonction qui inscrit en base de données un message pour le support, dans les tables t_support et envoyer
     */
    public function writeMessage(){
        $db = $this->dbConnect();
        $reqMessage = $db->prepare('INSERT INTO t_support (sup_title, sup_message, sup_date) VALUES (:title, :message, NOW());
              SET @messageId = LAST_INSERT_ID()');
        $reqMessage->execute([
            'title' => $_POST['title'],
            'message' => $_POST['message']
        ]);
        $reqMessage->closeCursor();

        $reqAssoc = $db->prepare('INSERT INTO envoyer (use_id, sup_id) VALUES (:userId, @messageId)');
        $reqAssoc->execute([
            'userId' => $_SESSION['id']
        ]);

        return true;
    }
}