<?php
require_once("../dbc/dbc_sled.php");

$sled = $_GET;

if(!isset ($sled["sled"])){
    exit ("タイトルが入力されていません");
}
if(mb_strlen ($sled["sled"] > 191)){
    exit ("タイトルの字数制限を超えています");
}
if(!isset ($sled["cateId"])){
    exit ("利用者IDが継承されていません");
}

if(!isset ($sled["userId"])){
    exit ("IDが継承されていません");
}

if(!isset ($sled["offId"])){
    exit ("事業所IDが継承されていません");
}
$dbc = new Sled();
$dbc->sledCreate($sled);


?>
