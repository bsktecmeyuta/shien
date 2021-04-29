<?php
session_start();
$count = 0;
  if(!isset($_SESSION["access"])){
    $_SESSION["access"] = 1;
    $count++;
  }
  print_r($count);
  $b=2;
  $a = array(
      "submit".strval($b) => "apple"
  );
  var_dump($a);
?>