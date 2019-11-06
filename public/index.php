<?php
 /**
  * Routing
  */

// include('../App/Views/template.php');
require('../App/Controllers/mainController.php');

$url = $_SERVER['QUERY_STRING'];

try{
    if(isset($url)){
        if($url == 'Inscription'){
            signUp();
        }elseif($url == 'Connexion'){
            signIn();
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
