<?php /* Smarty version 2.6.14, created on 2011-12-14 22:47:44
         compiled from register.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - gra online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta name="description" content="Plemiona to przegl�darkowa gra online. Ka�dy gracz posiada ma�� wiosk�, kt�r� ma doprowadzi� do w�adzy i chwa�y." />
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
						<?php if ($this->_tpl_vars['mode'] == 'rejestracja'): ?>
						<div class="info-block register" style="margin-left:10px">
															<h2>Rejestracja na plemiona</h2>

														<h3>Ka�dy gracz mo�e posiada� tylko jedno konto na �wiat!</h3>

							<p>Je�eli posiadasz, albo ju� kiedy� posiada�e� konto na jakim� innym �wiecie, nie musisz si� ponownie rejestrowa�. Zaloguj si� na <a href="./">Stronie startowej</a> !</p>
							
							<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
								<h3 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h3>
							<?php endif; ?>
							<br/>

							
							<form id="register_form" action="register.php?mode=rejestracja&amp;action=create" method="post">
								
								<label for="name">Imi� w grze:</label><br />
																<input id="name" name="name" type="text" value="" maxlength="50"/>
									<br />
								<label for="password">Has�o:</label><br />
																<input id="password" name="password" type="password" value="" maxlength="100"/>
									<br />

								<label for="password_confirm">Powt�rz has�o:</label><br />
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
										Rejestruj�c si� w grze akceptuj� Og�lne Warunki Handlowe oraz zasady ochrony danych.
									</td>

								  </tr>
								 </table>
								</div><br />

								
								<input id="register_button" type="submit" value="Zarejestrowa�" style="margin-top:8px;" />
							</form>
						</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'powodzenie' && $this->_tpl_vars['pokaz']): ?>
							<div class="info-block register" style="margin-left:10px">
								<h3>Rejestracja u�ytkownika <?php echo $this->_tpl_vars['username']; ?>
 przebieg�a pomy�lnie.</h3><br>
								<a href="index.php?log=<?php echo $this->_tpl_vars['username']; ?>
">Do strony g��wnej</a>
							</div>
						<?php endif; ?>
					</div>
					<div class="container-bottom-full"></div>

				</div>
			</div>

		
		
	</body>
</html>

