<?php
session_start();
require_once('../dbc/data.php');
require_once('../dbc/contents.php');
$offId = $_SESSION['offId'];
$cateId = $_SESSION['cateId'];
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

    <title>スレッド新規作成</title>
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
            <h1>スレッド新規作成</h1>
            <hr>
        </div>
        <form action="sled_create.php" method="GET">
            <p>就労継続支援<?= Command::selectOffId($offices,$offId)?></p>
            <p>カテゴリー:<?= Command::selectCateId($categories,$cateId)?></p>
            <p>ユーザー:<?= Command::selectUserId($users,$userId)?></p>
            <p>タイトル（191文字内）:</p>
            <textarea name="sled" id="sled" cols="30" rows="10"></textarea>
            <br>
            <input type="hidden" name = "offId" value="<?= $offId?>">
            <input type="hidden" name = "cateId" value="<?= $cateId?>">
            <input type="hidden" name = "userId" value="<?= $userId?>">
            <input type="submit" value="送信">
        </form>
    </div>
<main>
</body>
</html>