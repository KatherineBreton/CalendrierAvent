<?php

require_once('Manager.php');

/**
 * Class PrizeModel
 * Model qui regroupe les fonctions liées aux prix
 */
class PrizeModel extends Manager
{
    /**
     * @return array
     * Liste tous les prix inscrits en base de données dans la table t_prize
     */
    public function allPrize(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_prize');
        $req->execute();
        $prizeInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $prizeInfo;
    }

    /**
     * @return array
     * Fonction qui liste tous les prix qui ont été tirés (table gagner)
     */
    public function allWonPrizes(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM gagner');
        $req->execute();
        $allWon = $req->fetchAll(PDO::FETCH_ASSOC);

        return $allWon;
    }

    /**
     * @return mixed
     * Fonction qui permet de piocher aléatoirement un prix parmis la table t_prize, et qui inscrit dans la table gagner
     * le prix qui a été pioché avec l'utilisateur connecté
     */
    public function getRandomPrize(){
        $db = $this->dbConnect();

        $req = $db->prepare('
            (SELECT * 
            FROM t_prize 
            WHERE TYP_ID= 2 
            ORDER BY rand() 
            LIMIT 15) 
        UNION
            (SELECT * 
            FROM t_prize 
            WHERE TYP_ID= 1 
            ORDER BY rand() 
            LIMIT 80)
        UNION
            (SELECT * 
            FROM t_prize 
            WHERE TYP_ID=3 
            ORDER BY rand() 
            LIMIT 5)
        UNION
            (SELECT * 
            FROM t_prize 
            WHERE TYP_ID=4 
            ORDER BY rand() 
            LIMIT 0)
        ORDER BY RAND() LIMIT 1');
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

// (SELECT * FROM t_prize WHERE TYP_ID= 2 ORDER BY rand() LIMIT 15) 
// UNION
//  ( SELECT * FROM t_prize WHERE TYP_ID= 1 ORDER BY rand() LIMIT 80)
//  UNION
//  (SELECT * FROM t_prize WHERE TYP_ID=3 ORDER BY rand() LIMIT 5)
//  UNION
//  (SELECT * FROM t_prize WHERE TYP_ID=4 ORDER BY rand() LIMIT 0)
//  ORDER BY RAND() LIMIT 1;

// prepare('SELECT * FROM t_prize ORDER BY rand() LIMIT 1')