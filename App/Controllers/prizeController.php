<?php

require('../App/Models/prizeModel.php');

class prizeController{
    public function displayPrize(){
        $prizeModel = new PrizeModel();
        $display = $prizeModel->allPrize();
        return $display;
    }
}