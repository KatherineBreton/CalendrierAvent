<?php

require('../App/Models/userModel.php');

class UserController{
    public function signUp(){
        require('../App/Views/signUp.html.php');
        $userModel = new userModel();
        if(!empty($_POST)){
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
                if ($_POST['password'] == $_POST['passwordConfirm']) {
                    $signUp = $userModel->signUp();
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

    public function signIn(){
        require('../App/Views/signIn.html.php');
        $userModel = new userModel();
        if(!empty($_POST)){
            $signIn = $userModel->signIn();
            if(password_verify($_POST['password'], $signIn[0]['USE_PASSWORD'])){
                $_SESSION['id'] = $signIn[0]['USE_ID'];
                $_SESSION['mail'] = $signIn[0]['USE_MAIL'];
                $_SESSION['fname'] = $signIn[0]['USE_FNAME'];
                header('Location: Profil');
                return $signIn;
            }else{
                echo "Mauvais mail ou mot de passe";
            }
        }
    }

//public function displayAllUsers(){
//    $userModel = new userModel();
//    $display = $userModel->allUsers();
//    var_dump($display);
//    return $display;
//}

    public function displayProfile(){
        require('../App/Views/displayProfile.html.php');
        $userModel = new userModel();
        $display = $userModel->displayProfile();

        return $display;
//    var_dump($display);
    }

    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: Connexion');
    }

    public function messageSupport(){
        require('../App/Views/messageSupport.html.php');
        $userModel = new userModel();
        $message = $userModel->writeMessage();
        return $message;
    }
}

