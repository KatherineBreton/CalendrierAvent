<?php

require('../Models/adminModel.php');

class adminController{
//    Controller que la case admin est true
    public function adminVerify(){
        $adminModel = new adminModel();
        $adminVerify = $adminModel->isAdmin();
        if($adminVerify['use_role'] == 1){
            return true;
        }else{
            return false;
        }
    }

//    fonction lister les utilisateurs
    public function listAllUsers(){
        require('../App/Views/listAllUsers');
        if($this->adminVerify()){
            $adminModel = new adminModel();
            $listAllUsers = $adminModel->allUsers();
            return $listAllUsers;
        }else{
            return "Vous devez avoir les droits administrateur pour accéder à cette page";
        }
    }

//    fonction lire les messages support
    public function readMessages(){
        require('../App/Views/listMessages');
        if($this->adminVerify()){
            $adminModel = new adminModel();
            $readMessages = $adminModel->readMessages();
            return $readMessages;
        }else{
            return "Vous devez avoir les droits administrateur pour accéder à cette page";
        }
    }

//    fonction bannir un utilisateur
    public function banUser(){
        if($this->adminVerify()){

        }else{
            return "Vous devez avoir les droits administrateur pour accéder à cette page";
        }
    }

//    fonction choisir un big gain
    public function choosePrize(){
        if($this->adminVerify()){

        }else{
            echo "Vous devez avoir les droits administrateur pour accéder à cette page";
        }
    }
}