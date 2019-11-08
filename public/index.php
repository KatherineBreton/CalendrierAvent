<?php
 /**
  * Routing
  */

require('../App/Controllers/userController.php');
require('../App/Controllers/prizeController.php');

$url = $_SERVER['QUERY_STRING'];

try{
    if(isset($url)){
        $userController = new userController();
//        $prizeController = new prizeController();
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
            if($_SESSION){
                $displayProfile = $userController->displayProfile();
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == 'Deconnexion'){
            $logout = $userController->logout();
        }elseif($url == 'MessageSupport'){
            $messageSupport = $userController->messageSupport();
        }/*elseif($url == 'Calendrier'){
            $calendar = $prizeController->getPrize();
        }*/
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
