<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Triburile - Jocul online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
                <LINK rel="shortcut icon" href="graphic/index/rabe.png" type="image/x-icon">
		<meta name="description" content="Triburile este un joc online, care se petrece in evul mediu. Fiecare jucator este stapanul unui mic sat, pe care il aduce la faima si putere." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="index.css?1232382056" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="index_ie6.css" media="screen"/>
		<![endif]-->
									<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
				<style type="text/css">
		
			

		
		</style>
<link rel="alternate" type="application/rss+xml" title="Triburile - Informa�ii" href="http://triburile.ro/news.php?type=rss2.0" />
	</head>

	<body>
<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Triburile - Jocul online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://wiki.triburile.ro/">Wiki</a> - <a href="/help/index.php">Ajutor</a>  - <a href="rules.php">Reguli de joc</a>  - <a href="/forum">Forum</a>  - <a href="support.php">Suport</a>  - <a href="team.php">Echipa</a>  - <a href="stats.php">Statistic&#259;</a>
							</div>
						</div>
				</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin.png" alt="" /></span>			</div><div id="content">
  <div class="container-block-full">
    <div class="container-top-full"></div>
    <div class="container">
      <div class="info-block register">
							<h2 class="register">&#206;nscriere pe Lumea 1  <a href="world.php">&raquo; Alege o alt&#259; lume</a></h2>
							<h3>Fiecare juc&#259;tor are voie s&#259; aib&#259; doar un cont pro lume!</h3>
														<p>Dac&#259; ai deja un cont pe o alt&#259; lume sau ai avut mai de mult un cont, nu trebuie sa te &#238;nregistrezi din nou in mod normal. &#206;ncearca pe <a href="./">Pagina Principala</a> Login!</p>
																					<h3 class="error"></h3>

							<br/>
                                                        {if $error=='Username existiert bereits!'}
                                                        {assign var='error' value='Numele deja exista'}
                                                        {/if}
                                                        {if $error=='Der Benutzername muss mindestens 4 Zeichen lang sein!'}
                                                        {assign var='error' value='Numele de utilizator trebuie s� fie de cel pu�in 4 caractere!'}
                                                        {/if}
                                                        {if $error=='Das Passwort muss mindestens 4 Zeichen lang sein!'}
                                                        {assign var='error' value='Parola trebuie s� fie de cel pu�in 4 caractere!'}
                                                        {/if}
                                                        {if $error=='Du musst die Allgemeinen Nutzungsbedingungen akzeptieren!'}
                                                        {assign var='error' value='Trebuie s� accepta�i termenii �i condi�iile!'}
                                                        {/if}
                                                        {if $error=='Du musst das Passwort zweimal exakt gleich eingeben!'}
                                                        {assign var='error' value='Numele deja exista'}
                                                        {/if}
                                                        <h3 class="error">{$error}</h3>
							
							<form id="register_form" action="register.php?mode=new_account&amp;server=ro22&amp;action=validate" method="post">
								
								<label for="name">Porecla de joc:</label><br />
																<input id="name" name="name" type="text" value="" onchange="Register.checkInput('name', this.value)" />
								<span id="name_error" class="error"></span><br />
																<label for="password">Parola:</label><br />
																<input id="password" name="password" type="password" value="" onchange="Register.checkInputEqual('name', this.value);Register.checkInput('password', this.value)" />
								<span id="password_error" class="error"></span> <span id="password_errors" class="error"></span> <span id="password_info" class="info"></span><br />

								<label for="password_confirm">Reluarea parolei:</label><br />
																<input id="password_confirm" name="password_confirm" type="password" value="" onchange="Register.checkInputEqual('password', this.value)" />
								<span id="password_confirm_error" class="error"></span><br />

								<label for="email">E-mail:</label><br />
								<span class="small">(Este necesar pentru activare)</span><br />
								<div id="email_error" class="error" style="float:right;width:300px;"></div>
								<input id="email" name="email" type="text" value="" size="40" onchange="Register.checkInput('email', this.value)" /><br />

								<div><input id="agb" name="agb" type="checkbox" style="margin-bottom:0;"/><label for="agb">Accept termenii si condi&#355;iile generale</label>
								<label for="agb_link"><a href="javascript:popup_scroll('rules2.php', 600, 600)">(Arat&#259; termenii si condi&#355;iile generale)</a></td><label></div><br />
								
								
								<input id="register_button" type="submit" value="&#206;nregistrare" style="margin-top:8px;" />
							</form>
						</div>
					</div>
					<div class="container-bottom-full"></div>
				</div>
			</div><!-- content -->
						<div class="closure">				

                                
                			</div>		</div><!-- main -->