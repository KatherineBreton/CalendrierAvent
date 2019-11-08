<?php

require('../App/Models/prizeModel.php');

class prizeController{
    public function displayPrize(){
        require('../App/Views/displayPrize');
        $prizeModel = new PrizeModel();
        $display = $prizeModel->allPrize();
        return $display;
    }
}