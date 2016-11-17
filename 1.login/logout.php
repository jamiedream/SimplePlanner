<?php

session_start();
logout();//使用登出函數

function logout()
{
unset($_SESSION['email'], $_SESSION['password']);
header("Location: 0.login.php");
}

session_destroy();

?>
