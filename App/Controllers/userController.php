<?php

require('../Models/Manager.php');
require('../Models/userModel.php');

function listUser(){
    $user = new userModel();
    $displayUser = $user->getUser();

    require('');
}