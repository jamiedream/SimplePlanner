<?php
session_start();

header("content-type:text/html; charset=utf-8");

require_once("config.php");
include('define.php');


$password_md5 = md5($password);

$result = mysql_query("select * from dbmember where email='$email'");//選擇MySQL讀取路徑
$row = mysql_fetch_row($result);//抓取欄位內容


if ( $email == $row[3] && $password_md5 == $row[4])
    {
        $_SESSION['email'] = $email;
        //設定session傳給各網頁判斷是否為登入狀態
        header('Location: ../2.webpage/01.intro.php');
    }else {
        echo "<script> confirm('登入失敗')</script>";
        header("refresh:0; 0.login.php");
        exit();
    }
    //帳密不符或為空值則傳回登入頁





?>