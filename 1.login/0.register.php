<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>register</title>
    <link rel="stylesheet" href="../themes/loginstyle.css" />
    <script src="../themes/login.js"></script>
</head>

<body>
<form method="post" action="register.php">
    <div class="body"></div>
    <!--<div class="grad"></div>-->
    <div class="header">
        <div>七逃<span>Enjoy Your Life</span></div>
    </div>
    <br>
    <div class="register">
        <legend>免費註冊</legend>
        <input type="text" placeholder="姓名" name="username" id="username"><br>
        <input type="text" placeholder="電話" name="mobile" id="mobile" required pattern="[09]{2}[0-9]{8}"><br> 
        <input type="email" placeholder="電子信箱" name="email" id="email"><br>
        <input type="password" placeholder="密碼" name="password" id="password"><br>
        <input type="password" placeholder="再一次輸入密碼" name="password2" id="password2"><br>
        <input type="submit"  value="註冊" >
        <p><em>已經有帳號了?由此<a href="0.login.php"><span>登入</span></a></em></p>
    </div>
</form>
</body>

</html>