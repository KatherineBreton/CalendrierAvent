<?php

require('../App/Models/userModel.php');

function signUp(){
    require('../App/Views/signUp.html.php');
    $userModel = new userModel();
    if(!empty($_POST)){
//        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
            if($_POST['password'] == $_POST['passwordConfirm']){
                $signUp = $userModel->signUp();
//                var_dump($signUp);

                if($signUp == false){
                    throw new Exception("Impossible d'ajouter l'utilisateur");
                }
            }
//        }
    }
}

function signIn(){
    require('../App/Views/signIn.html.php');
    $userModel = new userModel();
        $signIn = $userModel->signIn();
        var_dump($signIn);
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

//function logout() {
//    session_start();
//    $_SESSION = array();
//    session_destroy();
//    header('Location:index.php');
//}