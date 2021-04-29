<?php
session_start();
require_once('../dbc/dbc_sled.php');
require_once('../dbc/data.php');
require_once('../dbc/contents.php');

$dbc = new Sled();

if(isset($_GET['array'])){
    parse_str($_GET['array'],$new);
    $_SESSION['offId'] = $new['offId'];
    $_SESSION['userId'] = $new['opositUserId'];
    $_SESSION['opositUserId'] = $new['userId'];
    $_SESSION['cateId'] = $new['cateId'];

    $userId = $_SESSION['userId'];
    $opositUserId = $_SESSION['opositUserId'];
    $offId = $_SESSION['offId'];
    $cateId = $_SESSION['cateId'];

    $sledData = $dbc->getAllSled($cateId,$userId,$offId);
}else{
    $_SESSION['cateId'] = $_GET['id'];
    $offId = $_SESSION['offId'];
    $userId = $_SESSION['userId'];
    $opositUserId = $_SESSION['opositUserId'];
    $cateId = $_SESSION['cateId'];

    $sledData = $dbc->getAllSled($cateId,$userId,$offId);
}
$array = array(
    "offId" => $offId,
    "userId" => $userId,
    "opositUserId" => $opositUserId,
    "cateId" => $cateId);
$html = http_build_query($array);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dbc/stylesheet.css">
    <title>スレッド</title>
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
                    <form action="sled.php" method="GET">
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
                    <form action="sled_serch.php" method="GET">    
                        <li><input type="text" name="name" placeholder="スレッドを検索">
                        <input type="submit" value="検索"></li>
                    </form>
                </div> 
            </ul>
        </div>
    </div>
</header>
<main>
    <div class="sled-wrapper">
        <div class="title">
            <h1>就労継続支援<?= Command::selectOffId($offices,$offId)?>事業所</h1>
            <hr>
        </div>
        <div class="sled-wrapper-title">
            <h2>カテゴリー:<?= Command::selectCateId($categories,$cateId)?></h2>
        </div>
        <p><a href="sled_new.php">新規スレッド</a></p>
        <div class="sled-tbl">
            <div class="sled-tbl-line">
                <?php foreach($sledData as $column):?>
                    <div class="sled-tbl-list">
                        <div class="sled-tbl-list-title left">
                            <p id="sled-title"><a href="../comment/comment.php?id=<?= $column['id']?>"><?= $column['sled']?></a></p>
                        </div>
                        <div class="sled-tbl-list-contents left">
                            <p id="sled-contents"><?= $column['contents']?></p>
                        </div>
                        <div class="sled-tbl-list-time right">
                            <p><?= $column['post_at']?></p>
                        </div>
                    </div>
                <?php endforeach ;?>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>