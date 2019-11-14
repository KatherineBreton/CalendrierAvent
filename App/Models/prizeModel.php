<?php

require_once('Manager.php');

/**
 * Class PrizeModel
 */
class PrizeModel extends Manager
{
    /**
     * @return array
     */
    public function allPrize(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_prize');
        $req->execute();
        $prizeInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $prizeInfo;
    }

    public function allWonPrizes(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM gagner');
        $req->execute();
        $allWon = $req->fetchAll(PDO::FETCH_ASSOC);

        return $allWon;
    }

    public function getRandomPrize(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_prize ORDER BY rand() LIMIT 1');
        $req->execute();
        $randomPrize = $req->fetch(PDO::FETCH_ASSOC);
//        return $randomPrize;

        $reqGagne = $db->prepare('INSERT INTO gagner (use_id, pri_id, pri_dateSelected, pri_selected) VALUES (:use_id, :pri_id, STR_TO_DATE(:pri_dateSelected, "%Y-%m-%d"), :pri_selected)');
        $reqGagne->execute([
           'use_id' => $_SESSION['id'],
           'pri_id' =>  $randomPrize['PRI_ID'],
           'pri_dateSelected' => $_GET['date'],
           'pri_selected' => 1
        ]);

        return $randomPrize;
    }

}