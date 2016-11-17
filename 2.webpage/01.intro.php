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
    <form method="post">
    <div data-role="page">
        <div data-role="header">
            <div class="head">
                <div>七逃<span>Enjoy Your Life</span></div>
            </div>
            <div id="menu" onmouseover="showMenu()" onmouseout="hideMenu()">MENU</div>
            <div data-role="panel" id="topPanel" onmouseover="showMenu()" onmouseout="hideMenu()">
                <ul>
                    <a href="" id="ha" onclick="tired()"><li>Home</li></a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="02.basic.php"><li>Basic Info</li></a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="03.tourism.php"><li>Tourism& Transit</li></a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="04.stuff.php"><li>Stuff& Notify</li></a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="05.others.php"><li>Others</li></a>
                    <li>&nbsp&nbsp|&nbsp&nbsp</li>
                    <a href="06.member.php"><li>Member</li></a>
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
            <div>
                <p id="intro">最遠的旅行，</p>
                <p id="intro-one">是從自己的身體到自己的心&nbsp是從一個人的心到另一個人的心 </p>
                <p id="intro-two">堅強不是面對悲傷不流一滴淚&nbsp而是擦乾眼淚後微笑著面對以後的生活</p>
                <p id="intro-three">帶上信仰&nbsp去尋找屬於你自己的國吧!哪怕傾盡一生</p><br>
                <p id="intro-four"><em>&nbsp&nbsp~Nausicaä of the Valley of the Wind</em></p>
            </div>
            <div>
                <a href="02.basic.php" id="stitched" onclick="clickFunction()">>>Start</a>
            </div>
        </div>
        <div data-role="footer" id="footer">
                <h4>Copyright © 2016 C. Y Yen. All rights reserved</h4>
        </div>
    </div>
    </form>


</body>

</html>
