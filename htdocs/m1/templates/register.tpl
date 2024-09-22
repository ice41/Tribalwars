<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Die Stämme - Anmelden</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js" type="text/javascript"></script>
</head>

<body>
<table class="main" width="800" align="center"><tr><td>
<h1>Anmelden</h1>
<h3 style="font-weight:bold">Jeder Spieler darf pro Welt nur einen Account spielen!</h3>

<p>Wenn du bereits über einen Stämme Account auf einer anderen Welt verfügst oder früher einen Account hattest, ist eine neue Anmeldung meist nicht erforderlich. Einfach auf der <a href="./">Startseite</a> einloggen!</p>


<h3 class="error">{$error}</h3>

<table cellpadding="0" cellspacing="0" align="center">
<tr>
<td style="background-image:url(graphic/border/r1.png)" width="8" height="8"></td>
<td style="background-image:url(graphic/border/r2.png)"></td>
<td style="background-image:url(graphic/border/r3.png)" width="8"></td>
</tr>
<tr>
<td style="background-image:url(graphic/border/r4.png)" height="8"></td>
<td>
	<form action="register.php?action=validate" method="post">
	<table>
	<tr>
	<td>Name im Spiel:</td><td><input name="name" type="text" value="{$name}" /></td>
	</tr>

	<tr>
	<td>Passwort:</td><td><input name="password" type="password" value="" /></td>
	</tr>
	<tr>
	<td>Passwort wiederholen:</td><td><input name="password_confirm" type="password" value="" /></td>
	</tr>

	<tr>
	<td colspan="2"><label><input name="agb" type="checkbox" />Ich akzeptiere die allgemeinen Nutzungsbedingungen</label> <a href="javascript:popup_scroll('rules.php', 600, 480)">(ANB anzeigen)</a></td>
	</tr>

	<tr>
	<td colspan="2"><br /><input type="submit" value="Registrieren" /></td>
	</tr>

	</table>
	</form>
</td>
<td style="background-image:url(graphic/border/r5.png)"></td>
</tr>

<tr>
<td style="background-image:url(graphic/border/r6.png)" height="8"></td>
<td style="background-image:url(graphic/border/r7.png)"></td>
<td style="background-image:url(graphic/border/r8.png)"></td>
</tr>

</table>

</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
