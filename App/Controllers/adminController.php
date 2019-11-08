<?php

require_once('../App/Models/adminModel.php');
/**
 * Class adminController
 */
class adminController{
    /**
     * @return bool
     * Vérifie si l'utilisateur a des droits administrateur
     * Si retourne true, l'utilisateur est admin
     */
    public function adminVerify(){
        $adminModel = new adminModel();
        $adminVerify = $adminModel->isAdmin();
        if($adminVerify['use_role'] == 1){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return array
     */
    public function listAllUsers(){
        require('../App/Views/listAllUsers');
        if($this->adminVerify()){
            $adminModel = new adminModel();
            $listAllUsers = $adminModel->allUsers();
            return $listAllUsers;
        }else{
            echo "Vous devez avoir les droits administrateur pour accéder à cette page";
        }
    }

    /**
     * @return array
     */
//    Ajouter jointure avec la table envoyer
    public function readMessages(){
        require('../App/Views/listMessages');
        if($this->adminVerify()){
            $adminModel = new adminModel();
            $readMessages = $adminModel->readMessages();
            return $readMessages;
        }else{
            echo "Vous devez avoir les droits administrateur pour accéder à cette page";
        }
    }

//    fonction bannir un utilisateur
    public function banUser(){
        if($this->adminVerify()){

        }else{
            echo "Vous devez avoir les droits administrateur pour accéder à cette page";
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