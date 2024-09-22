<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - gra online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta name="description" content="Plemiona to przeglądarkowa gra online. Każdy gracz posiada małą wioskę, którą ma doprowadzić do władzy i chwały." />
		<link rel="stylesheet" type="text/css" href="index.css" />
	</head>

	<body>
	

		<div id="index_body">
			<div id="main">
						<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Plemiona - gra online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">

						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://www.plemiona.pl/rules.php">Zasady</a> - 
<a href="http://help.plemiona.pl">Pomoc</a> - <a href="http://wiki.plemiona.pl/">Wiki</a> - <a href="http://webchat.quakenet.org/?channels=plemiona&uio=Mj10cnVlJjk9dHJ1ZSYxMT00MQa2">Chat</a> - <a href="http://forum.plemiona.pl/">Forum</a> - <a href="http://www.sklepplemiona.pl/" target="_blank">Sklep</a> - <a href="team.php">Team</a> - <a href="http://www.kurierplemion.pl" target="_blank">Kurier</a> - <a href="http://support.innogames.de/login?game=staemme&lang=pl">Support</a> - <a href="stat_frame.php">Statystyki</a> - <a href="http://plemiona.pl/hall_of_fame.php">Komnata</a> - <a href="sds_rounds.php">Szybkie</a> - <a href="http://www.plemiona.pl/validate_email.php">Aktywacja</a>

							</div>
						</div>
				</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>
						<div id="content">
				<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
					<div id="screenshot_image"></div>

				</div>
				<div class="container-block-full">
					<div class="container-top-full"></div>
					<div class="container">
						{if $mode == 'rejestracja'}
						<div class="info-block register" style="margin-left:10px">
															<h2>Rejestracja na plemiona</h2>

														<h3>Każdy gracz może posiadać tylko jedno konto na świat!</h3>

							<p>Jeżeli posiadasz, albo już kiedyś posiadałeś konto na jakimś innym świecie, nie musisz się ponownie rejestrować. Zaloguj się na <a href="./">Stronie startowej</a> !</p>
							
							{if !empty($error)}
								<h3 class="error">{$error}</h3>
							{/if}
							<br/>

							
							<form id="register_form" action="register.php?mode=rejestracja&amp;action=create" method="post">
								
								<label for="name">Imię w grze:</label><br />
																<input id="name" name="name" type="text" value="" maxlength="50"/>
									<br />
								<label for="password">Hasło:</label><br />
																<input id="password" name="password" type="password" value="" maxlength="100"/>
									<br />

								<label for="password_confirm">Powtórz hasło:</label><br />
									<input id="password_confirm" name="password_confirm" type="password" value="" maxlength="100"/>
								<br />

								<label for="email">E-Mail:</label><br />
								<span class="small">(Potrzebne do aktywacji)</span><br />
						

								<input id="email" name="email" type="text" value="" size="40" maxlength="150"/><br />
								
								<div>
								 <table width="100%">
								  <tr>
									<td valign="top" width="20px"><input id="agb" value="1" name="agb" type="checkbox"/></td>
																											<td>
										Rejestrując się w grze akceptuję Ogólne Warunki Handlowe oraz zasady ochrony danych.
									</td>

								  </tr>
								 </table>
								</div><br />

								
								<input id="register_button" type="submit" value="Zarejestrować" style="margin-top:8px;" />
							</form>
						</div>
						{/if}
						{if $mode == 'powodzenie' && $pokaz}
							<div class="info-block register" style="margin-left:10px">
								<h3>Rejestracja użytkownika {$username} przebiegła pomyślnie.</h3><br>
								<a href="index.php?log={$username}">Do strony głównej</a>
							</div>
						{/if}
					</div>
					<div class="container-bottom-full"></div>

				</div>
			</div>

		
		
	</body>
</html>


{*
<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Die Stämme - Anmelden</title>
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
*}