<?php
 /**
  * Routing
  */

require_once('../App/Controllers/userController.php');
require_once('../App/Controllers/prizeController.php');
require_once('../App/Controllers/adminController.php');
session_start();

//Permet de passer des variables dans l'URL ($_GET)
$url = $_SERVER['REDIRECT_URL'];

try{
    if(isset($url)){
        $userController = new userController();
        $prizeController = new prizeController();
        if($url == '/Inscription'){
            if($_SESSION){
                $displayProfile = $userController->displayProfile();
            }else{
                $signUp = $userController->signUp();
            }
        }elseif($url == '/Connexion'){
            if($_SESSION){
                $displayProfile = $userController->displayProfile();
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == '/Profil'){
            if($_SESSION){
                $displayProfile = $userController->displayProfile();
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == '/Deconnexion'){
            $logout = $userController->logout();
        }elseif($url == '/MessageSupport'){
            $messageSupport = $userController->messageSupport();
        }elseif($url == '/Calendrier'){
//            $calendar = $prizeController->getRandomPrize();
            require('../App/Views/calendar.html.php');
        }elseif($url == '/Gagne'){
            $win = $prizeController->getRandomPrize();
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
