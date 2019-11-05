<?php

/**
 * Class Manager
 * Database Connection
 */

class Manager{
    protected function dbConnect(){
        $db = new PDO('mysql:host=localhost;dbname=calendrieravent;charset=utf8', 'root', '');
        return $db;
    }
}