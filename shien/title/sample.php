<?php
require_once('../dbc/data.php');
require_once('../dbc/contents.php');
if(!isset($_GET['array'])){
    session_start();
    $_SESSION['offId'] = $_GET['id'];
    $offId = $_SESSION['offId'];
    $userId = $_SESSION['userId'];
    $opositUserId = $_SESSION['opositUserId'];
    $array = array(
        "offId" => $offId,
        "userId" => $userId,
        "opositUserId" => $opositUserId);

}elseif(isset($_GET['array'])){
    $new = $_GET['array'];
    $_SESSION['userId'] = $new['opositUserId'];
    $_SESSION['opositUserId'] = $new['userId'];
    $_SESSION['offId'] = $new['offId'];
    $offId = $_SESSION['offId'];
    $userId = $_SESSION['userId'];
    $opositUserId = $_SESSION['opositUserId'];
    $array = array(
        "offId" => $offId,
        "userId" => $userId,
        "opositUserId" => $opositUserId
    );
}


?>