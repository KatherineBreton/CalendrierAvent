<?php
 /**
  * Routing
  */
 include('../App/Views/template.php');
require('../App/Controllers/mainController.php');

$url = $_SERVER['QUERY_STRING'];
$page = $_GET[$url];

try{
    if(isset($page)){
        if($page == 'Inscription'){
            signUp();
        }elseif($page == 'Connexion'){
            signIn();
        }
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
