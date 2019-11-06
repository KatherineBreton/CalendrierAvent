<?php

//require('../App/Models/Manager.php');
require('../App/Models/userModel.php');

function signUp(){
    $userModel = new userModel();
    if(isset($_POST['mail']) && isset($_POST['password'])){
        $signUp = $userModel->signUp();
        require('../App/Views/signUp.html.php');
    }
}

function signIn(){
    $userModel = new userModel();
    $signIn = $userModel->signIn();
    require('../App/Views/signIn.html.php');
}

function displayAllUsers(){
    $userModel = new userModel();
    $display = $userModel->displayUsers();
    require('../App/Views/signIn.html.php');
}

