<?php
session_start();

header("content-type:text/html; charset=utf-8");
require_once("config.php");
include('define.php');
include('definePlan.php');
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

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
$id = $row[0];
//由登入資料確認會員id

$sqlPlan = "select * from dbPlanner where mid='$id'";
$resultPlan = mysql_query($sqlPlan);
$rowPlan = mysql_fetch_row($resultPlan);
//由id找到會員存入資料



?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <title>七逃。私人旅遊企畫助手</title>
    <link rel="stylesheet" href="../themes/finalPage.css">
    <!--<script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.min.js'></script>-->
    <script type='text/javascript' src='../themes/theme.js'></script>
</head>

<body onSelectStart="event.returnValue=false" >
    <!--鎖定文字-->
    <div data-role="page">
        <div data-role="header">
            <div class="head">
                <div>七逃<span>Enjoy Your Life</span></div>
            </div>
            <div id="menu" onmouseover="showMenu()" onmouseout="hideMenu()">MENU</div>
            <div data-role="panel" id="topPanel" onmouseover="showMenu()" onmouseout="hideMenu()">
                <ul>
                    <a href="01.intro.php"><li>Home</li></a>
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
        <form method="post" action="finalOutput.php">
        <div data-role="content">
            <div>
                <marquee id="subtitle" scrollamount="5">七逃。All for your unique travel plan</marquee>
            </div>
            <div id="final">
                <div>
                    <input type="submit" name="download" id="download" onclick="confirmDownload()" value="Click here! Download as a PDF file."/>
                    <input type="submit" name="delete" id="delete" onclick="confirmDelete()" value="Delete this one. Start a new one!"/>

                </div>
        </form>
                Country:<input type="text" value="<?= $rowPlan[2];?>" readonly>
                City:<input type="text" value="<?= $rowPlan[3];?>" style="width:340px;" readonly>
                <br>
                Currency:<input type="text" value="<?= $rowPlan[10];?>" readonly>
                Voltage:<input type="text" value="<?= $rowPlan[7];?>" style="width:300px;" readonly>
                <br>
                Date of Departure:<input type="text" value="<?= $rowPlan[5];?>" style="width:222px;" readonly>
                Date of Return:<input type="text" value="<?= $rowPlan[6];?>" style="width:222px;" readonly>
                <br>
                Visa:<input type="text" value="<?= $rowPlan[4];?>" style="width:745px;" readonly>
                <br>
                Socket:<input type="text" value="<?= $rowPlan[8];?>" style="width:720px;" readonly>
                <br>
                Weather:<br><textarea onkeyup="autogrow(this);" readonly><?= $rowPlan[9];?></textarea>
                <br>
                Tourism:<br><textarea onkeyup="autogrow(this);" readonly><?= $rowPlan[11];?></textarea>
                <br>
                Transit:<br><textarea  onkeyup="autogrow(this);" readonly><?= $rowPlan[12];?></textarea>
                <br>
                Stuff:<br><textarea onkeyup="autogrow(this);" readonly><?= $rowPlan[13];?></textarea>
                <br>
                Pay Attention For:<br><textarea onkeyup="autogrow(this);" readonly><?= $rowPlan[14];?></textarea>
                <br>
                Others:<br><textarea onkeyup="autogrow(this);" readonly><?= $rowPlan[15];?></textarea>
            </div>
        </div>

        <div data-role="footer"  id="footer">
                <h4>Copyright © 2016 C. Y Yen. All rights reserved</h4>
        </div>
    </div>
    </form>

</body>

</html>
