<?php
session_start();

header("content-type:text/html; charset=utf-8");

require_once("config.php");
include('define.php');
include('definePlan.php');
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$email = $_SESSION['email'];
// 從登入時的email位置確認會員資料

$sql = "select * from dbmember where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$id = $row[0];


if( $_POST['save']){
    if($idPlan==$id){
        echo '<script> confirm("計畫還在編輯中喔!")</script>';
        header("refresh:0;" . $_SERVER['HTTP_REFERER']);
        break;
    }else{
        $sql ="insert into dbPlanner (mid, country, city, visa, dateDep, dateRet, voltage, plugIn,
               weather, exchangeRate, tourism, transit, stuff, event, others) values 
                ('$id','$country','$city','$visa','$dateDep','$dateRet','$voltage','$plugIn',
                '$weather','$exchangeRate','$tourism','$transit','$stuff','$event','$others')";
        if(mysql_query($sql)){
        echo '<script> confirm("儲存成功")</script>';
        header("refresh:0;" . $_SERVER['HTTP_REFERER']);
        // 儲存成功重新整理本頁
        }
    }
}
//新增資料,若有資料還在編輯會出現提醒


$sqlPlan = "select * from dbPlanner where mid='$id'";
$resultPlan = mysql_query($sqlPlan);
$rowPlan = mysql_fetch_row($resultPlan);
$idPlan = $rowPlan[1];
//將dbmember $id帶入dbPlanner中的mid-->$idPlan||$rowPlan[1]


if( $_POST['update']){
    $sql="update dbPlanner set country='$country', city='$city', visa='$visa', dateDep='$dateDep'
        , dateRet='$dateRet', voltage='$voltage', plugIn='$plugIn', weather='$weather', exchangeRate='$exchangeRate'
        where mid='$id'";
    if(mysql_query($sql)){
        echo '<script> confirm("更新完成")</script>';
        header("refresh:0;" . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
// update page2

if( $_POST['update2']){
    $sql="update dbPlanner set tourism='$tourism', transit='$transit' where mid='$idPlan'";
    if(mysql_query($sql)){
        echo '<script> confirm("更新完成")</script>';
        header("refresh:0;" . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

// update page3

if( $_POST['update3']){
    $sql="update dbPlanner set stuff='$stuff', event='$event' where mid='$id'";
    if(mysql_query($sql)){
        echo '<script> confirm("更新完成")</script>';
        header("refresh:0;" . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

// update page4
if( $_POST['update4']){
    $sql="update dbPlanner set others='$others' where mid='$id'";
    if(mysql_query($sql)){
        echo '<script> confirm("更新完成")</script>';
        header("refresh:0;" . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

//修正資料

if($_POST['complete']){
     header("Location: 07.final.php");
    
}
//complete button到final page




?>