<?php

require('../App/Models/userModel.php');

function signUp(){
    require('../App/Views/signUp.html.php');
    $userModel = new userModel();
    if(!empty($_POST)){
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
            if($_POST['password'] == $_POST['passwordConfirm']){
                $signUp = $userModel->signUp();
//                var_dump($signUp);

                if($signUp == false){
                    throw new Exception("Impossible d'ajouter l'utilisateur");
                }
            }
        }
    }
}

function signIn(){
    require('../App/Views/signIn.html.php');
    $userModel = new userModel();
        $signIn = $userModel->signIn();
        if(!empty($_POST)){
            if(password_verify($_POST['password'], $signIn[0]['USE_PASSWORD'])){
                $_SESSION['id'] = $signIn[0]['USE_ID'];
                $_SESSION['mail'] = $signIn[0]['USE_MAIL'];
                echo "Vous êtes bien connecté " . $_SESSION['mail'];
            }else{
                echo "Mauvais mail ou mot de passe";
            }
        }
}

//function displayAllUsers(){
//    $userModel = new userModel();
//    $display = $userModel->displayUsers();
//    var_dump($display);
//}

function displayProfile(){
    $userModel = new userModel();
    $display = $userModel->displayProfile();
    var_dump($display);
}

function logout() {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: ');
}