<?php
	include("../include/config.php");
	mysql_connect($config['db_host'], $config['db_user'], $config['db_pw']) or die (mysql_error());
	mysql_select_db($config['db_name']) or die (mysql_error());
?>