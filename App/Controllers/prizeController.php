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

//    public function (){
//        require('../App/Views/calendar.html.php');
//        $prizeModel = new prizeModel();
//        $getPrize = $prizeModel->getRandomPrize();
//
//        return $getPrize;
//    }

    public function getRandomPrize(){
//        require('../App/Views/win.html.php');
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

//    Fonction si le name du a est égal au date du jour (currentDate), l'user a gagné, sinon on le redirige (header)
}