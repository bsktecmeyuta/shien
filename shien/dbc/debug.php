<?php
session_start();
require_once("dbc_sled.php");
$a = new Sled();
$id ="1";
$count = 0;
        $dbh = $a->dbConnect();
        if(empty($id)){
            exit("idが不正です");
        }
        $sqla = "select * from sled where id=:id";
        $stmt = $dbh->prepare($sqla);
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            exit("ブログが違います");
        }
        print_r($result);
        print_r($result['access_count']);
        echo "<br>";
        $r = $result['access_count'];
        $i = $result['id'];
        $count = $r;
                if(!isset($_SESSION["access"])){
                    $_SESSION["access"] = 1;
                    $count++;
                }
                print_r($count);
                $sqlb = "update sled set access_count = :count where id= $id";
                $stmt = $dbh->prepare($sqlb);
                $stmt->bindValue(':count',(int)$count,PDO::PARAM_INT);
                $stmt->execute();
?>