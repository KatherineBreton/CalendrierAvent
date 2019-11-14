<?php

require_once('../App/Models/prizeModel.php');

/**
 * Class prizeController
 */
class prizeController{
    /**
     * @return array
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

//    Fonction qui vérifie si un user a déjà joué aujourd'hui
    public function verifyDay(){
        $prizeModel = new PrizeModel();
        $verify = $prizeModel->allWonPrizes();
//        return $verify;
        for($i = 0; $i < $verify; $i++){
            if(($verify[$i]['PRI_DATESELECTED'] == $this->generateDate()) && ($verify[$i]['USE_ID'] == $_SESSION['id'])){
                return true;
            }else{
                return false;
            }
        }
    }
}