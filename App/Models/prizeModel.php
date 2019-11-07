<?php

require ('Manager.php');

class PrizeModel extends Manager{
    public function allPrize(){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM t_prize');
        $req->execute();
        $prizeInfo = $req->fetchAll(PDO::FETCH_ASSOC);

        return $prizeInfo;
    }


}