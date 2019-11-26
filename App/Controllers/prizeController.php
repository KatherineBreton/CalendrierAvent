<?php

require_once('../App/Models/prizeModel.php');

/**
 * Class prizeController
 * Le controller lié aux prix
 */
class prizeController{
    /**
     * @return array
     * Affiche tous les prix de la table t_prize
     */
    public function displayPrize(){
        require('../App/Views/displayPrize');
        $prizeModel = new PrizeModel();
        $display = $prizeModel->allPrize();
        return $display;
    }

    public function getRandomPrize(){
        $prizeModel = new prizeModel();
        $getPrize = $prizeModel->getRandomPrize();
        return $getPrize;
    }

    /***
     * @return false|string
     * Permet la simulation de la date, si une variable est entrée dans l'URL, on l'utilise, sinon on utilise la date du jour
     */
    public function generateDate(){
        if(isset($_GET['date'])){
            $currentDate = $_GET['date'];
            return $currentDate;
        }else{
            $currentDate = date('Y-m-d');
            return $currentDate;
        }
    }

        /***
     * @return bool
     * Permet de vérifier si un utilisateur a déjà joué pour une date donnée
     */
    public function verifyDay(){
        $prizeModel = new PrizeModel();
        $verify = $prizeModel->allWonPrizes(); 
        // var_dump(count($verify));
        for($i = 0; $i < count($verify); $i++){
            // var_dump($verify[$i]['PRI_DATESELECTED']);
            if(($verify[$i]['PRI_DATESELECTED'] == $this->generateDate()) && ($verify[$i]['USE_ID'] == $_SESSION['id'])){
                return true;
            }else{
                return false;
            }
        }
    }
}