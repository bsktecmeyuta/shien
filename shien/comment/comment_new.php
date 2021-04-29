<?php
session_start();
require_once("../dbc/dbc_sled.php");
require_once('../dbc/data.php');
require_once('../dbc/contents.php');
$sledId = $_SESSION['sledId'];
$a =  new Sled();
$result = $a->getsled($sledId); 

$userId = $_SESSION['userId'];
$opositUserId = $_SESSION['opositUserId'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dbc/stylesheet.css">

    <title>コメント新規作成</title>
</head>
<body>

<header>
    <div class="header-wrapper container">
        <div class="header-left">
            <ul>
                <div class="user">
                    <li><?= Command::selectUserId($users,$userId)?>用</li>
                </div>
                <div class="jump">
                    <li><a href="<?= Command::selectUserHref($users,$opositUserId)?>"><?= Command::selectUserId($users,$opositUserId)?>ver</a></li>
                </div>
            </ul>
        </div>
        <div class="header-center">
            <h1>就労継続支援ちゃっと</h1>
        </div>
        <div class="header-right">
            <ul>
                <div class="header-right-login">
                    <div class="btn">
                        <li><a href = "login.php">ログイン</a></li>
                    </div>
                </div>
                <div class="header-right-serach">
                    <form action="">    
                        <li><input type="text">
                        <input type="submit" value="検索"></li>
                    </form>
                </div> 
            </ul>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="title">
            <h1>コメント新規作成</h1>
            <hr>
        </div>
        <form action="comment_create.php" method="GET">
            <p><?= $result["sled"]?></p>
            <p>コメント（191文字内）:</p>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            <br>
            <input type="hidden" name = "sledId" value="<?= $sledId?>">
            <input type="submit" value="送信">
        </form>
    </div>
<main>
</body>
</html>