<?php
require_once("data.php");

$counter=2;

$user = new Who("利用者","/title/title_user.php");
$supporter = new Who("支援員","/xampp/htdogs/shien/title/title_support.php");
$users = array($user,$supporter);


$a = new Office("A型");
$b = new office("B型");
$offices = array($a,$b);

$future = new Category("利用者の将来");
$work = new Category("仕事");
$about = new Category("今の施設について");
$support = new Category("サポート環境");
$tax = new Category("控除申請");
$facility = new Category("施設情報");

$categories = array($future,$work,$about,$support,$tax,$facility);


?>