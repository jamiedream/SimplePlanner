<?php

header("content-type:text/html; charset=utf-8");

session_start();


require_once("config.php");
include('define.php');
//email不可同時相等存在
$sql = "select * from dbmember where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$password_md5 = md5($password);

if($email == $row[3]){
    echo "<script> confirm('Email已存在')</script>";
    header ('refresh:0; 0.register.php');

}else if($username == null || $mobile == null || $email == null || $password == null || $password2 == null)
{
    echo "<script> confirm('資料填寫不完整')</script>";
    header ('refresh:0; 0.register.php');
}else if($password != $password2){
    echo "<script> confirm('密碼不一致')</script>";
    header ('refresh:0; 0.register.php');
}else{
    
    mysql_query("insert into dbmember (username, mobile, email, password)
    values ('$username','$mobile','$email','$password_md5')");
    //將各欄位的值帶入資料表,密碼透過md5單向加密演算法加密,管理者看到密碼為亂數
    echo '<script> confirm("註冊成功!請登入")</script>';
    header ('refresh:0; 0.login.php');
    
}




?>