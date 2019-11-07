<?php
 /**
  * Routing
  */

require('../App/Controllers/userController.php');

$url = $_SERVER['QUERY_STRING'];

try{
    if(isset($url)){
        $userController = new userController();
        if($url == 'Inscription'){
            if($_SESSION){
                $displayProfile = $userController->displayProfile();
            }else{
                $signUp = $userController->signUp();
            }
        }elseif($url == 'Connexion'){
            if($_SESSION){
                $displayProfile = $userController->displayProfile();
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == 'Profil'){
            $displayProfile = $userController->displayProfile();
        }elseif($url == 'Deconnexion'){
            $logout = $userController->logout();
        }elseif($url == 'MessageSupport'){
            $messageSupport = $userController->messageSupport();
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
