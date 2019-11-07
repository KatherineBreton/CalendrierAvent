<?php
 /**
  * Routing
  */

require('../App/Controllers/mainController.php');

$url = $_SERVER['QUERY_STRING'];

try{
    if(isset($url)){
        $controller = new userController();
        if($url == 'Inscription'){
            if($_SESSION){
                $displayProfile = $controller->displayProfile();
            }else{
                $signUp = $controller->signUp();
            }
        }elseif($url == 'Connexion'){
            if($_SESSION){
                $displayProfile = $controller->displayProfile();
            }else{
                $signIn = $controller->signIn();
            }
        }elseif($url == 'Profil'){
            $displayProfile = $controller->displayProfile();
        }elseif($url == 'Deconnexion'){
            $logout = $controller->logout();
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
