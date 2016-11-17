<?php
session_start();

header("content-type:text/html; charset=utf-8");
require_once("config.php");
include('define.php');


if(!$_SESSION['email']){
      echo '<script> confirm("請先登入/註冊")</script>';
      header ("Refresh: 0; ../1.login/0.login.php");
      exit();
}
// 判定使用者登入狀況

$email = $_SESSION['email'];
// 從登入時的email位置確認會員資料

$sql = "select * from dbmember where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);



?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <title>七逃。私人旅遊企畫助手</title>
    <link rel="stylesheet" href="../themes/theme.css">
    <!--<script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.min.js'></script>-->
    <script type='text/javascript' src='../themes/theme.js'></script>
</head>

<body onSelectStart="event.returnValue=false">
    <!--鎖定文字-->
    <div data-role="page">
        <div data-role="header">
            <div class="head">
                <div>七逃<span>Enjoy Your Life</span></div>
            </div>
            <div id="menu" onmouseover="showMenu()" onmouseout="hideMenu()">MENU</div>
            <div data-role="panel" id="topPanel" onmouseover="showMenu()" onmouseout="hideMenu()">
                <ul>
                    <a href="01.intro.php">
                        <li>Home</li>
                    </a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="02.basic.php">
                        <li>Basic Info</li>
                    </a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="03.tourism.php">
                        <li>Tourism& Transit</li>
                    </a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="04.stuff.php">
                        <li>Stuff& Notify</li>
                    </a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="05.others.php">
                        <li>Others</li>
                    </a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="" id="ha" onclick="tired()">
                        <li>Member</li>
                    </a>
                </ul>
            </div>
            <a href="../1.login/logout.php">
                <div id="logout">Logout</div>
            </a>
        </div>
        <!--topPanel-->
        <div data-role="content">
            <div>
                <marquee id="subtitle" scrollamount="5">七逃。All for your unique travel plan</marquee>
            </div>
            <div id="contentBoard"></div>
            <form method="post" action="../1.login/update.php">
            <div id="member">
                <legend>修改會員資料</legend>
                <updatePageUsername>Member <strong><?= $row[1];?></strong> online</updatePageUsername>
                <br><hr>
                Name:<input type="text" placeholder="姓名" name="username" id="username" value="<?= $row[1];?>"><br>
                Mobile:<input type="text" placeholder="電話" name="mobile" id="mobile" value="<?= $row[2];?>" required pattern="[09]{2}[0-9]{8}"><br>
                Password:<input type="password" placeholder="密碼" name="password" id="password" value="<?= $row[4];?>"><br>
                <p>Double check before this step.</p>
                E-mail:<input type="email" placeholder="電子信箱" name="email" id="email">
                <input type="submit" value="確認更新">
            </div>
            </form>
        </div>
        <div data-role="footer" id="footer">
            <h4>Copyright © 2016 C. Y Yen. All rights reserved</h4>
        </div>
    </div>




</body>

</html>
