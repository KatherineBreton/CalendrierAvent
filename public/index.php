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
            if($_SESSION) {
                $logout = $userController->logout();
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == '/MessageSupport'){
            $messageSupport = $userController->messageSupport();
        }elseif($url == '/Calendrier'){
            if($_SESSION){
//                $calendar = $prizeController->getRandomPrize();
                require('../App/Views/calendar.html.php');
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == '/Gagne'){
            if($_SESSION) {
                require('../App/Views/win.html.php');
//                $win = $prizeController->getRandomPrize();
            }else{
                $signIn = $userController->signIn();
            }
        }elseif($url == '/mauvaisJour'){
            if($_SESSION) {
                require('../App/Views/badDay.html.php');
            }else{
                $signIn = $userController->signIn();
            }
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
