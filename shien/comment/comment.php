<?php
session_start();

require_once('../dbc/dbc_comment.php');
require_once('../dbc/data.php');
require_once('../dbc/contents.php');
require_once('../dbc/dbc_counter.php');
$userId = $_SESSION['userId'];
$opositUserId = $_SESSION['opositUserId'];

$sled = $_GET;

$dbc = new Comment();
$commentData = $dbc->getAllComment($sled['id']);
$result = $dbc->getsled($sled['id']);

$_SESSION['sledId'] = $sled['id']; 


$c = new Counter();
$pageCount = $c->getCounter($sled['id']);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dbc/stylesheet.css">
    
    <title>スレッド詳細</title>
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
    <div class="c-wrapper">
        <div class="c-outline c-container">
            <div class="c-sled c-container">
                <div class="c-s-title">
                    <h1><?= $result['sled']?></h1>
                    <hr>
                    <p class=""><a href="comment_new.php">新規コメント</a></p>
                    <p><?php echo $pageCount['access_count'];?></p>
                </div>
                <div class="a-container">
                <div class="c-comment">
                    <div class="c-list c-container">      
                        <div class="c-s-id">
                            <p><span class="id">1</span><?= $result['post_at']?></p>
                        </div>
                        <div class="c-s-contents">
                            <p><?= $result['contents']?></p>
                        </div>
                    </div>
                    <?php foreach($commentData as $column):?>
                        <div class="c-list c-container">        
                            <div class="c-list-id">
                                <p><span class="id"><?= $counter?></span><?= $column['post_at']?></p>
                                <?php $counter++?>
                            </div>
                            <div class="c-list-comment">
                                <p><?= $column['comment']?></p>
                            </div>
                        </div>
                    <?php endforeach ;?>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>