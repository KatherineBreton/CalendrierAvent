<?php

require_once('../App/Models/userModel.php');

/**
 * Class UserController
 * Controller lié aux utilisateurs
 */
class UserController{
    /**
     * @return bool
     * @throws Exception
     * Fonction qui permet l'inscription.  Elle vérifie que le mail a le bon format et que les deux mots de passe entrés
     * correspondent.  La requête SQL liée ne s'exécute que si le mail entré n'est pas déjà présent en base de données
     * (clé unique sur le champ use_mail)
     */
    public function signUp(){
        require('../App/Views/signUp.html.php');
        $userModel = new userModel();
        if(!empty($_POST)){
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
                if ($_POST['password'] == $_POST['passwordConfirm']) {
                    $signUp = $userModel->signUp();
                    header('Location: /Profil');
//                        var_dump($signUp);
                    if ($signUp == false) {
                        throw new Exception("Impossible d'ajouter l'utilisateur");
                    }
                    return $signUp;
                } else {
                    echo "Les mots de passe ne correspondent pas";
                }
            } else {
                echo "Le format de l'adresse mail n'est pas valide";
            }
        }
    }

    /**
     * @return array
     * Fonction qui permet la connexion
     * Elle vérifie que le mot de passe entré correspond à celui en base de données
     * Elle inscrit dans la variable $_SESSION les informations de l'utilisateur
     */
    public function signIn(){
        require('../App/Views/signIn.html.php');
        $userModel = new userModel();
        if(!empty($_POST)){
            $signIn = $userModel->signIn();
            if(password_verify($_POST['password'], $signIn[0]['USE_PASSWORD'])){
                if($signIn[0]['USE_ISBANNED'] == 0){
                    $_SESSION['id'] = $signIn[0]['USE_ID'];
                    $_SESSION['mail'] = $signIn[0]['USE_MAIL'];
                    $_SESSION['fname'] = $signIn[0]['USE_FNAME'];
                    $_SESSION['date'] = $signIn[0]['USE_DATE'];
                    header('Location: Profil');
                    return $signIn;
                }else{
                    echo "Vous avez été banni, vous ne pouvez plus vous connecter";
                }
            }else{
                echo "Mauvais mail ou mot de passe";
            }
        }
    }

    /**
     * @return array
     * Affiche le profil de l'utilisateur connecté
     */
    public function displayProfile(){
        require('../App/Views/displayProfile.html.php');
        $userModel = new userModel();
        $display = $userModel->displayProfile();

        return $display;
    }

    /**
     * @return bool
     * Permet la déconnexion de l'utilisateur
     */
    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: /Connexion');
        return true;
    }

    /**
     * @return bool
     * Fonction qui permet d'écrire un message au support
     */
    public function messageSupport(){
        require('../App/Views/messageSupport.html.php');
        $userModel = new userModel();
        if(!empty($_POST)) {
            $message = $userModel->writeMessage();
            return $message;
        }
    }
}

