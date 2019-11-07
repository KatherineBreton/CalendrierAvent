<?php
 /**
  * Routing
  */

require('../App/Controllers/mainController.php');

$url = $_SERVER['QUERY_STRING'];

try{
    if(isset($url)){
        if($url == 'Inscription'){
            signUp();
        }elseif($url == 'Connexion'){
            if($_SESSION){
                displayProfile();
            }else{
                signIn();
            }
        }elseif($url == 'Profil'){
            displayProfile();
        }elseif($url == 'Deconnexion'){
            logout();
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
