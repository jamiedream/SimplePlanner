<?php
header("content-type:text/html; charset=utf-8");

session_start();
require_once("config.php");
$link = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname,$link);

if(!$_SESSION['$username']){
   echo '<script> confirm("請先登入/註冊")</script>';
  header ("Refresh: 1; 0.login.php");
  exit();
}



?>