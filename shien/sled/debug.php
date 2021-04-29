<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <input type="text" name="name">
    <input type="submit" value="送信">
    </form>
</body>
</html>

<?php
    $_POST['name'];
    $dsn = "mysql:host=localhost;dbname=shien;charset=utf8";
    $user = "yutaka";
    $pass = "Yutaka1220";
    try{
        $dbh=new PDO($dsn,$user,$pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        if(empty($_POST['name'])){
            exit;
        }
        $sql = "select * from sled where sled like :name";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', '%' . addcslashes($_POST['name'], '\_%') . '%', PDO::PARAM_STR);
        $stmt->execute();
        $stmt->debugDumpParams();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        if(!$result){
            exit("ありません");
        }
    }catch(PDOExeception $e){
        echo "接続失敗".$e->getMessage();
        exit();
    };
    print_r($result);

?>