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
        require('../App/Views/calendar.html.php');
        $prizeModel = new prizeModel();
        $getPrize = $prizeModel->getRandomPrize();
        return $getPrize;
    }
}