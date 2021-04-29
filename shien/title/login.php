<?php
require_once("../dbc/dbc_sled.php");

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
    <h1>ログイン</h1>
    <p><a href="n_login.php">新規登録</a></p>
    <hr>
    <form action="try_login.php" method="GET">
        <p>ユーザー名:</p>
        <input type="text" name="userName">
        <p>パスワード:</p>
        <input type="text" name="password">
        <br>
        <input type="submit" value="ログインする">
    </form>
</body>
</html>