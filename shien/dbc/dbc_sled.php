<?php
class Sled{

    function dbConnect(){
        $dsn = "mysql:host=localhost;dbname=shien;charset=utf8";
        $user = "yutaka";
        $pass = "Yutaka1220";
        try{
            $dbh=new PDO($dsn,$user,$pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        }catch(PDOExeception $e){
            echo "接続失敗".$e->getMessage();
            exit();
        };
        return $dbh;
    }
    
    function getAllSled($cateId,$userId,$offId){
        $dbh = $this->dbConnect();
        $sql = 'select * from sled where cateId=:cateId and user = :userId and offId = :offId';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':cateId',(int)$cateId,PDO::PARAM_INT);
        $stmt->bindValue(':userId',(int)$userId,PDO::PARAM_INT);
        $stmt->bindValue(':offId',(int)$offId,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
  
    function sledCreate($sleds){
        $dbh = $this->dbConnect();
        $sql= "INSERT into 
            sled(sled,offId,cateId,user) 
            VALUES 
            (:sled,:offId,:cateId,:userId)";
        $dbh->beginTransaction();
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':sled',$sleds['sled'],PDO::PARAM_STR);
            $stmt->bindValue(':offId',$sleds['offId'],PDO::PARAM_INT);
            $stmt->bindValue(':cateId',$sleds['cateId'],PDO::PARAM_INT);
            $stmt->bindValue(':userId',$sleds['userId'],PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            echo "スレッドを投稿しました";
         }catch(PDOExeception $e){
            $dbh->rollBack();
            exit($e);
         }
    }
    function getsled($id){
        $dbh = $this->dbConnect();
        if(empty($id)){
            exit("idが不正です");
        }
        $sql = "select * from sled where id=:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            exit("ブログが違います");
        }
        return $result;
    }
    function getserchSled($name,$userId,$offId){
        $dbh = $this->dbConnect();
        if(empty($name)){
            exit;
        }
        $sql = "select * from sled where user = :userId and offId = :offId and sled like :name";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':userId',(int)$userId,PDO::PARAM_INT);
        $stmt->bindValue(':offId',(int)$offId,PDO::PARAM_INT);
        $stmt->bindValue(':name', '%' . addcslashes($name, '\_%') . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        if(!$result){
            exit("ありません");
        }
        return $result;
    }
    function setCategoryName($category){
        if($category === "1"){
            return "利用者の将来";
        }elseif($category === "2"){
            return "仕事";
        }elseif($category === "3"){
            return "今の施設について";
        }elseif($category === "4"){
            return "サポート環境";
        }elseif($category === "5"){
            return "控除申請";
        }elseif($category === "6"){
            return "施設情報";
        }
    }
    function setOfficeName($office){
        if($office === "1"){
            return "A型";
        }elseif($office === "2"){
            return "B型";
        }
    }
}

?>