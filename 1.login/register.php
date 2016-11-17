<?php

header("content-type:text/html; charset=utf-8");

session_start();


require_once("config.php");
include('define.php');
//username&email不可重複
$sql = "select * from dbmember where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$password_md5 = md5($password);


if( $row[3] == $email){
    echo "<script> confirm('E-mail已存在')</script>";
    header ('refresh:0; 0.register.php');
}else if( $username == null){
    echo '<script> confirm("請填寫使用者名稱")</script>';
    header ('refresh:0; 0.register.php');
}else if( $mobile == null){
    echo '<script> confirm("請填寫電話")</script>';
    header ('refresh:0; 0.register.php');
}else if( $email == null){
    echo '<script> confirm("請填寫E-mail")</script>';
    header ('refresh:0; 0.register.php');
}else  if( $password == null){
    echo '<script> confirm("請填寫密碼")</script>';
    header ('refresh:0; 0.register.php');
}else if( $password2 == null){
    echo '<script> confirm("請再一次確認密碼")</script>';
    header ('refresh:0; 0.register.php');
}else if( $password != $password2){
    echo '<script> confirm("密碼不一致")</script>';
    header ('refresh:0; 0.register.php');
}else{
    mysql_query("insert into dbmember (username, mobile, email, password)
    values ('$username','$mobile','$email','$password_md5')");
    //將各欄位的值帶入資料表,密碼透過md5單向加密演算法加密,管理者看到密碼為亂數
    echo '<script> confirm("註冊成功!請登入")</script>';
    header ('refresh:0; 0.login.php');

}


// !empty($username) && !empty($mobile) && !empty($email) &&
// !empty($password) && !empty($password2) && $password == $password2


// {
//     mysql_query("insert into dbmember (username, mobile, email, password, password2)
//     values ('$username','$mobile','$email','".md5($password)."','".md5($password2)."')");
//     //將各欄位的值帶入資料表,密碼透過md5單向加密演算法加密,管理者看到密碼為亂數
//     header("Location:../2.webpage/01.intro.php");//註冊成功直接跳首頁
    
// }else{
//     echo '<script> confirm("Try again!")</script>';
//     header("Location:0.register.php");//註冊失敗回到沒有資料的註冊頁
//     exit();
// }





?>