<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="../themes/loginstyle.css" />
    <script src="../themes/login.js"></script>
</head>

<body>
<form method="post" action="login.php">
    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>七逃<span>Enjoy Your Life</span></div>
    </div>
    <br>
    <div class="login">
        <input type="email" placeholder="E-mail" name="email"><br>
        <input type="password" placeholder="password" name="password"><br>
        <input type="submit" name="btnOK" value="登入">
        <!--22-->
        <a href="0.register.php">
        <input type="button" value="註冊" name="loginRegister">
        </a>
    </div>
</form>
</body>

</html>