<?php
session_start();
require_once('../dbc/data.php');
require_once('../dbc/contents.php');

if(isset($_GET['array'])){
    parse_str($_GET['array'],$new);
    $_SESSION['offId'] = $new['offId'];
    $_SESSION['userId'] = $new['opositUserId'];
    $_SESSION['opositUserId'] = $new['userId'];

    $userId = $_SESSION['userId'];
    $opositUserId = $_SESSION['opositUserId'];
    $offId = $_SESSION['offId'];
}else{
    $_SESSION['offId'] = $_GET['id'];
    $offId = $_SESSION['offId'];
    $userId = $_SESSION['userId'];
    $opositUserId = $_SESSION['opositUserId'];
}
$array = array(
    "offId" => $offId,
    "userId" => $userId,
    "opositUserId" => $opositUserId);
$html = http_build_query($array);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dbc/stylesheet.css">

    <title>カテゴリー選択</title>
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
                    <form action="select.php" method="GET">
                        <li><button type="submit"><?= Command::selectUserId($users,$opositUserId)?>ver</button></li>
                        <input type="hidden" name="array" value="<?= $html?>">
                    </form>
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
                    <form action="../sled/sled_serch.php"  method="GET">    
                        <li><input type="text" name="name" placeholder="スレッドを検索">
                        <input type="submit" value="検索"></li>
                    </form>
                </div> 
            </ul>
        </div>
    </div>
</header>
<main>
    <div class="category-wrapper">
        <div class="title">
            <h1 class="s_title">就労継続支援<?= Command::selectOffId($offices,$offId)?>事業所</h1>
            <hr>
        </div>
        <div class="category">
            <h2>カテゴリー一覧</h2>
            <div class="category-list">
                <?php foreach($categories as $cateId => $category):?>
                    <div class="category-line">
                        <form action="../sled/sled.php" method="get">
                            <button type="submit" class="cate_select"><?= $category->getCateName()?></button>
                            <input type="hidden" name="id" value="<?= $cateId?>">     
                        </form>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</main>
<footer>
</footer>
</body>
</html>