<?php
require_once("dbc_sled.php");

class Counter extends Sled{
    private $counts = 0;
    function getCounts(){
        return $this->count;
    }
    function setCounts($counts){
        $this->counts = $counts;
    }
    function countsplus($id){
        if(!isset($_SESSION["access".strval($id)])){
            $_SESSION["access".strval($id)] = 1;
            $this->getCounts()++;
        }
    }
    function getCounter($id){
        
        $dbh = $this->dbConnect();
        if(empty($id)){
            exit("idが不正です");
        }
        $sqla = "select access_count from sled where id=:id";
        $stmt = $dbh->prepare($sqla);
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            exit("ブログが違います");
        }

        $r = $result['access_count'];
            $this->setCounts($r);
            $this->countsPlus($id);
            $sqlb = "update sled set access_count = :count where id= :id";
            $stmt = $dbh->prepare($sqlb);
            $stmt->bindValue(':count',(int)$this->countsPlus(),PDO::PARAM_INT);
            $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
            $stmt->execute();
            
        $sqlc = "select access_count from sled where id=:id";
        $stmt = $dbh->prepare($sqlc);
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $end = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$end){
            exit("ブログが違います");
        }
        return $end;
    
    }
    function updateCounter($id){
        $dbh = $this->getCounter($id);
        $r = $dbh['access_count'];
            $r = $count;
            if(!isset($_SESSION["access"])){
                $_SESSION["access"] = 1;
                $count++;
            }
            $sql = "update sled set access_count = :count where id= :id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':count',(int)$count,PDO::PARAM_INT);
            $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
            $stmt->execute();
    }
}


?>