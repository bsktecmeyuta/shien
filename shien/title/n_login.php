<?php
/*session_start();

$offId = $_SESSION['offId'];
$cateId = $_SESSION['cateId'];

/*echo $offId.$cateId;
require_once('dbc_sled.php');
$a = new Sled();
/*
$offId = $_GET['offId'];
$cateId  =$_GET['cateId'];
var_dump($offId,$cateId);
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新規登録</h1>
    <hr>
    <form action="c_login.php" method="GET">
        <p>ユーザー名:</p>
        <input type="text" name="userName">
        <p>メールアドレス:</p>
        <input type="text" name="email">
        <p>パスワード:</p>
        <input type="text" name="password">
        <br>
        <input type="submit" value="登録する">
    </form>
</body>
</html>