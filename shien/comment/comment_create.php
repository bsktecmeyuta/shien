<?php
require_once("../dbc/dbc_comment.php");

$comment = $_GET;


if(!isset ($comment['comment'])){
    exit ("タイトルが入力されていません");
}
if(mb_strlen ($comment['comment'] > 191)){
    exit ("タイトルの字数制限を超えています");
}
if(!isset ($comment['sledId'])){
    exit ("IDが継承されていません");
}
$dbc = new Comment();
$dbc->commentCreate($comment);


?>
