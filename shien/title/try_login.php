<?php
require_once("../dbc/dbc_login.php");

$user = $_GET;

if(empty ($user['userName'])){
    exit ("ユーザーネームが入力されていません");
}

if(empty ($user['password'])){
    exit ("パスワードが入力されていません");
}

if(mb_strlen ($user['userName'] > 121)){
    exit ("ユーザーネームの字数制限を超えています");
}
if(mb_strlen ($user['password'] > 121)){
    exit ("パスワードの字数制限を超えています");
}
$dbc = new User();
$dbc->login($user);


?>
