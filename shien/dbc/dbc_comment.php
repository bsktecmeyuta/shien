<?php
require_once('dbc_sled.php');
class Comment extends Sled{

    function getAllComment($id){
        $dbh = $this->dbConnect();
        $sql = 'select * from sled 
        join comment
        on sled.id = comment.sled_id
        where sled.id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
    function commentCreate($comment){
        $dbh = $this->dbConnect();
        $sql= "INSERT into 
            comment(comment,sled_id) 
            VALUES 
            (:comment,:sledId)";
        $dbh->beginTransaction();
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':comment',$comment['comment'],PDO::PARAM_STR);
            $stmt->bindValue(':sledId',$comment['sledId'],PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            echo "スレッドを投稿しました";
        }catch(PDOExeception $e){
            $dbh->rollBack();
            exit($e);
        }
    }
    function getcomment($id){
        $dbh = $this->dbConnect();
        if(empty($id)){
            exit("idが不正です");
        }
        $sql = "select * from sled join comment on sled.id = comment.sled_id where id=:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            exit("ブログが違います");
        }
        return $result;

    }

}
?>