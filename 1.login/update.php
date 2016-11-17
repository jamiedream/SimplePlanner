<?php
header("content-type:text/html; charset=utf-8");

session_start();
require_once("config.php");
include('define.php');


$sql = "select * from dbmember where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

////////////////////////////////////
$password_md5=md5($password);

if($email == $row[3]){
    $sql_update = "update dbmember set username='$username', mobile='$mobile', password='$password_md5' where email='$email'";
    if(mysql_query($sql_update)){
            echo "<script> confirm('更新成功')</script>";
            header("refresh:0; ../2.webpage/06.member.php");
            }
}else{
    echo "<script> confirm('再試一次')</script>";
    header("refresh:0; ../2.webpage/06.member.php");
}            
            
// 更新資料---通過密碼認證
//////////////////////////////////////////////////
// $password_md5=md5($password);

// if($password == null){
//     $password_md5 = $row[4];
// }else{
//     $password_md5 = md5($_POST['password']);
// }

// $sql_update = "update dbmember set mobile='$mobile', email='$email', password='$password_md5' where username='$username'";

// if(mysql_query($sql_update)){
//     echo "更新成功";
// }else{
//     echo "更新失敗";
// }

// 更新資料2

?>