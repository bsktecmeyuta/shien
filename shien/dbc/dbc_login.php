<?php
require_once('dbc_sled.php');

class User extends Sled{
    public function login($user){
        $dbh = $this->dbConnect();
        $sql = 'select * from user where user_name=:userName';
        $dbh->beginTransaction();
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':userName',$user["userName"],PDO::PARAM_STR);
            $stmt->execute();
            $dbh->commit();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($user['password'],$result['password'])){
                echo "ログインに成功しました";
            }else{
                echo "ログインに失敗しました";
            }
        }catch(PDOExeception $e){
            $dbh->rollBack();
            exit($e);
         }
    }
    public function userCreate($user){
        $dbh = Sled::dbConnect();
        $sql= "INSERT into 
            user(user_name,e_mail,password) 
            VALUES 
            (:userName,:email,:password)";
        $dbh->beginTransaction();
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':userName',$user['userName'],PDO::PARAM_STR);
            $stmt->bindValue(':email',$user['email'],PDO::PARAM_STR);
            $stmt->bindValue(':password',password_hash($user['password'],PASSWORD_DEFAULT),PDO::PARAM_STR);
            $stmt->execute();
            $dbh->commit();
            echo "登録しました";
            }catch(PDOExeception $e){
            $dbh->rollBack();
            exit($e);
            }
    }


}

?>