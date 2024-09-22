<?php
if (isset($_GET['h'])) $g_h = parse( $_GET['h'] );

if ($session['hkey']==$g_h) {
	$sid->logout($user['id']);
	setcookie("session", "", time()-1);

}
else
{
	die("HKEY jest bledny!!");
}

header ("LOCATION: ../logout.php") ?>