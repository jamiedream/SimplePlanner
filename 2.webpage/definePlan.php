<?php


$country = $_POST['country'];
$city = $_POST['city'];
$visa = $_POST['visa'];
$dateDep = $_POST['dateDep'];
$dateRet = $_POST['dateRet'];
$voltage = $_POST['voltage'];

// $socket = $_POST['Socket'];
// $plugIn = implode(",", $socket);
//If no checkboxes in a specific group are checked, that variable will not be posted and will be undefined.

$plugIn = !empty($_POST['Socket']) 
              ? implode(',', $_POST['Socket'])
              : false;
//每讀取一個陣列中非空白的值，用逗號隔開

$weather = $_POST['weather'];
$exchangeRate = $_POST['currency'];
//02.basic↑

$tourism = $_POST['tour'];
$transit = $_POST['tran'];
$stuff = $_POST['stuff'];
$event = $_POST['note'];
$others = $_POST['others'];

?>