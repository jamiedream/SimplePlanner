<?php
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '1234';
	$dbname = 'memberPlanner';

	
	$link = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname,$link);

?>