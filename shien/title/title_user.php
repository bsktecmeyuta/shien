<?php
session_start();
require_once('../dbc/data.php');
require_once('../dbc/contents.php');
$_SESSION['userId'] = "0";
$_SESSION['opositUserId'] = "1";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dbc/stylesheet.css">
    <title>特定就労支援の悩み</title>
</head>
<body>
<header>
    <div class="header-wrapper container">
        <div class="header-left">
            <ul>
                <div class="user">
                    <li>利用者用</li>
                </div>
                <div class="jump">
                    <li><a href="title_supporter.php">支援員ver</a></li>
                    
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
    <div class="title container">
        <h1>特定就労継続支援に関するチャット</h1>
        <hr>
    </div>
    <div class="logo container">       
        <?php foreach($offices as $offId => $office): ?>
            <div class="select">
                <form action="select.php" method="get">
                    <button type="submit" class="off_select">就労継続支援<?= $office->getOffName()?></button>
                    <input type="hidden" name="id" value="<?= $offId?>">
                </form>
            </div>
        <?php endforeach;?>
    </div>
<footer>
</footer>
</main>
</body>
</html>