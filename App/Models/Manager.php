<?php

/**
 * Class Manager
 * Database Connection
 */

class Manager{
    protected function dbConnect(){
        try {
            $dsn_bdd = 'mysql:host=localhost;dbname=calendrieravent';
            $user_bdd = 'root';
            $pass_bdd = '';
            $options = [

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $db = new PDO($dsn_bdd, $user_bdd, $pass_bdd, $options);
            return $db;
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
}