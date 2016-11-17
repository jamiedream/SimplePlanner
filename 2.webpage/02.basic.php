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
    <link rel="stylesheet" href="../themes/theme.css">
    <!--<script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.min.js'></script>-->
    <script type='text/javascript' src='../themes/theme.js'></script>
</head>

<body onSelectStart="event.returnValue=false">
    <!--鎖定文字-->
    <div data-role="page" id="page">
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
                    <a href="" id="ha" onclick="tired()">
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
                    <a href="06.member.php">
                        <li>Member</li>
                    </a>
                </ul>
            </div>
            <a href="../1.login/logout.php">
                <div id="logout">Logout</div>
            </a>
        </div>
        <!--topPanel-->
        <form method="post" action="updatePlan.php">
        <div data-role="content" >
            <div>
                <marquee id="subtitle" scrollamount="5">七逃。All for your unique travel plan</marquee>
            </div>
            <div id="contentBoard"></div>
            <div id="basicInfo">
                
                <table>
                     <tr>
                     <td><fieldset data-role="controlgroup">
                            <label for="country">Country:</label>
                            <input type="text" name="country" id="country" value="<?= $rowPlan[2];?>" placeholder="Country" />
                        </fieldset>
                     </td>
                     <td>
                        <fieldset data-role="controlgroup">
                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" value="<?= $rowPlan[3];?>" placeholder="City/ City/ City" />
                        </fieldset>
                      </td>
                      <td rowspan="3">
                        <fieldset data-role="controlgroup">
                            <label for="visa">Visa:</label><br>
                            <textarea name="visa" id="visa"><?= $rowPlan[4];?></textarea>
                        </fieldset>
                      </td>
                      </tr>
                      <tr>
                        <td>
                        <fieldset data-role="controlgroup">
                            <label for="date">Date:</label><br>
                            <input type="date" name="dateDep" id="dateDep" value="<?= $rowPlan[5];?>" placeholder="Date" />
                            <input type="date" name="dateRet" id="dateRet" value="<?= $rowPlan[6];?>" placeholder="Date" />
                        </fieldset>
                       </td>
                       <td>
                        <fieldset data-role="controlgroup">
                            <label for="voltage">Voltage: </label>
                            <input type="text" name="voltage" id="voltage" value="<?= $rowPlan[7];?>" placeholder="Voltage" />
                        </fieldset>
                       </td>
                     </tr>
                     <tr>
                      <td colspan="2">
                        <fieldset data-role="controlgroup">
                            <label for="currency">Currency:</label>
                            <input type="text" name="currency" id="currency" value="<?= $rowPlan[10];?>" placeholder="Currency& Exchange rate" />
                            <a href="http://www.findrate.tw/" target="_blank">FindRate</a>
                        </fieldset>
                      </td>
                     </tr>
                </table>
                <fieldset data-role="controlgroup">
                    <label for="weather">Weather:</label>
                    <a href="http://www.weather-forecast.com/" target="_blank">各地氣象查詢</a><br>
                    <textarea name="weather" id="weather"><?= $rowPlan[9];?></textarea>
                </fieldset>

                <fieldset data-role="controlgroup">
                    <legend>Socket:</legend>
                    <input type="text" name="showType" value="<?= $rowPlan[8];?>"><br>
                    <input type="checkbox" name="Socket[]" value="SocketA" />A
                    <input type="checkbox" name="Socket[]" value="SocketB" />B
                    <input type="checkbox" name="Socket[]" value="SocketC" />C
                    <input type="checkbox" name="Socket[]" value="SocketD" />D
                    <input type="checkbox" name="Socket[]" value="SocketE" />E
                    <input type="checkbox" name="Socket[]" value="SocketF" />F
                    <input type="checkbox" name="Socket[]" value="SocketG" />G
                    <input type="checkbox" name="Socket[]" value="SocketI" />I
                    <input type="checkbox" name="Socket[]" value="SocketJ" />J
                    <input type="checkbox" name="Socket[]" value="SocketK" />K
                    <input type="checkbox" name="Socket[]" value="SocketL" />L
                    <input type="checkbox" name="Socket[]" value="SocketM" />M
                    <input type="checkbox" name="Socket[]" value="SocketN" />N
                    <input type="checkbox" name="Socket[]" value="SocketO" />O
                    <input type="checkbox" name="Socket[]" value="SocketP" />P
                    <a href="http://www.yung-li.com.tw/tw/info/ww_specifications.htm" target="_blank">各國電壓插頭形式一覽表</a>
                </fieldset>

            </div>
            <div>
                <input type="submit" name="save" id="save" value="新增">
            </div>
            <div>
                <input type="submit" name="update" id="update" value="更新">
            </div>
            
        </div>
        </form>
        <div data-role="footer" id="footer">
            <h4>Copyright © 2016 C. Y Yen. All rights reserved</h4>
        </div>
    </div>




</body>

</html>
