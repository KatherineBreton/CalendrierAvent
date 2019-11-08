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

    public function getRandomPrize(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_prize ORDER BY rand()');
        $req->execute();
        $randomPrize = $req->fetch(PDO::FETCH_ASSOC);
        return $randomPrize;
    }


}