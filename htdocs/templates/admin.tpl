<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Plemiona - administracja</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<link rel="stylesheet" type="text/css" href="../stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">
{if $loging}
<table class="main" width="840" align="center">
<tr>
<td style="padding:2px;">
	<h2>Administracja - logowanie</h2>
	{if !empty($error)}
		<font color="red">{$error}</font><br>
	{/if}
	<form method="POST" action="admin.php?action=zaloguj">
		has�o: <input type="password" name="pass" value=""><br /><input type="submit" value="Login">
	</form><br /><br />
</td></tr></table>
{else}

<table cellspacing="0" width="100%">
	<tr>
		<td width="250" valign="top">

			<table class="main" width="100%"><tr><td>
				<tr>
					<td>
						<table class="vis" width="100%">
							<tr><th>Funkcje podstawowe</th></tr>
							<tr><td><a href="admin.php?screen=index">Edycja strony g��wnej</a></td></tr>
							<tr><td><a href="admin.php?screen=create_new_server">Utworzenie nowego serwera</a></td></tr>
						</table>
						<br>
						<table class="vis" width="100%">
							<tr><th>Akcje</th></tr>
							<tr><td><a href="admin.php?action=wyloguj">Wyloguj</a></td></tr>
						</table>
					</td>
				</tr>
			</table>
	
		</td>
		<td width="*" valign="top">

			<table class="main" width="100%">
				<tr>
					<td style="padding:2px;">
						{if !empty($error)}
							<font color="red">{$error}</font><br>
						{else}
							{if in_array($screen,$allow_screens)}
								{include file="admin_$screen.tpl" title=foo}
							{/if}
						{/if}
						<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">wygenerowany w {$load_msec} ms
						Czas z serwera: <span id="serverTime">{$date}</span></p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script type="text/javascript">startTimer();</script>

{/if}
</body>
</html>