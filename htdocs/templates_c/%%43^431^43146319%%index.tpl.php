<?php /* Smarty version 2.6.14, created on 2012-04-28 19:49:08
         compiled from ../templates/index.tpl */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>iTriburile 8.2 - Jocul online</title>
		<link rel="shortcut icon" href="/graphic/rabe_38x40.png" type="image/x-icon" />
		<link rel="icon" href="/graphic/rabe_38x40.png" type="image/x-icon" />
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
	</head>

	<body>

<div id="gamebar">
			<div id="gamebar_content">
				<div id="flag1_dropdown" style="display: inline;"><ul id="flags">
<li style="background:url(http://gamebar.innogames.de/sprite.png) no-repeat 0px -340px; padding-left: 20px; padding-bottom:3px"><a href="/index.php">Romana</a></li>
<li style="background:url(http://gamebar.innogames.de/sprite.png) no-repeat 0px -468px; padding-left: 20px; padding-bottom:3px"><a href="/index.php">Germana</a></li>
<li style="background:url(http://gamebar.innogames.de/sprite.png) no-repeat 0px -84px; padding-left: 20px; padding-bottom:3px"><a href="/index.php">Engleza</a></li>
</ul>
<a href="#" onclick="javascript:toggle_visibility('flags')">
<img src="http://gamebar.innogames.de/free/ro.gif" alt="ro" /><img src="http://gamebar.innogames.de/drop.png" alt="" /></a>
</div>
				<a href="/george.php" >Made by George Dates</a>
			</div>
		</div>
		<div id="index_body">
			<div id="main">
			  <div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;"></a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://wiki.triburile.ro/">Wiki</a> - <a href="/help/index.php">Ajutor</a>  - <a href="rules.php">Reguli de joc</a>  - <a href="/forum">Forum</a>  - <a href="support.php">Suport</a>  - <a href="team.php">Echipa</a>  - <a href="stats.php">Statistic&#259;</a>
							</div>
						</div>
					</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin.png" alt="" /></span>						</div>				<div id="content">
					<div class="container-block">
						<div class="container-top"></div>
						<div class="container">
															<div class="info-block">
	<h2>iTriburile 8.2</h2>
								<p>Triburile este un joc online, care se petrece &icirc;n evul mediu. Fiecare juc&#259;tor este st&#259;p&#226;nul unui mic sat, pe care &icirc;l aduce la faim&#259; &#351;i putere.</p>

																		<a class="btn-kostenlos-anmelden" href="register.php">&#206;nscrie-te acum gratis!</a>
																		<strong>Imagini din jocul pe browser:</strong>
									<ul class="screenshots">
										<li><a href="javascript:toggle_screenshot(1)"><img src="graphic/index/tribalwars-map.png" alt="Browser game Tribal Wars: World map" /></a></li>
										<li><a href="javascript:toggle_screenshot(2)"><img src="graphic/index/tribalwars-rally-point.png" alt="Browser game Tribal Wars: The rally point" /></a></li>
										<li class="last"><a href="javascript:toggle_screenshot(3)"><img src="graphic/index/tribalwars-paladin.png" alt="Browser game Tribal Wars: The paladin" /></a></li>
									</ul>
								<br style="clear:both;" />
								<strong style="padding-top:10px;">Particip&#259; deja <?php echo $this->_tpl_vars['players']; ?>
 juc&#259;tori!</strong>	
</div>														<div class="login-block">
	<h2 style="text-align:left;margin-bottom:15px;">iTriburile 8.2- Login</h2>
		<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
         <?php if ($this->_tpl_vars['error'] == 'Passwort ung�ltig.'): ?>
            <?php $this->assign('error', 'Parola incorecta.'); ?>
         <?php endif; ?>
		 <?php if ($this->_tpl_vars['error'] == 'Account nicht vorhanden.'): ?>
		    <?php $this->assign('error', 'Contul nu a fost gasit.'); ?>
	     <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Account wurde gesperrt.'): ?>
		    <?php $this->assign('error', 'Contul este blocat.'); ?>
	     <?php endif; ?>

	<h3 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h3>
      <?php endif; ?>
		<form action="index.php?action=login" method="post">
		<div>
			<label for="user">
				<strong>Nume de utilizator:</strong>
				<span><input id="user" name="user" class="text" type="text" value="" /></span>
			</label>
			<label for="password">
				<strong>Parola:</strong>
				<span><input name="clear" type="hidden" value="true" /><input id="password" name="password" class="text" type="password" /></span>
			</label>
                        <label for="server_select" id="server_select_label">
	                <strong >Lume:</strong>
	                <select id="server_select" class="server_select" name="server" >
											                        <option value="RO1" >RO1 v15.000</option>
						                        
						</label>
			<input type="submit" value="" id="login-btn-input" onmouseover="javascript:hover_toggle_css('login-btn-input','login-btn-input-hover',false);return true;" onmouseout="javascript:hover_toggle_css('login-btn-input','login-btn-input-hover',false);return true;" />
			<br style="clear:both;"/>
			<p><label for="cookie" style="text-align:right;">
									
			</label></p>                        
						                </select>
	            
			
		</div>
	</form>
</div>
						</div>
						<div class="container-bottom"></div>
					</div>
				</div><!-- content -->
											<div id="footer">
					<div class="footer-header"></div>
					<div class="footer-holder">
																	<div>
							<span class="global-news">&nbsp;</span>
							<strong>26.11.10 20:34</strong>
							<p>
								VS 8.2 (2.1) a fost lansata. Distractie placuta !!!
								<br /><a href="/index.php">&raquo; mai mult</a>							</p>
						</div>
						
																						</div>
					<div class="footer-bottom"></div>
				</div><!-- footer -->
										<div class="closure">
				&copy; 2012 by George Dates &middot;				
                                
                			</div>			</div><!-- main -->
<script type="text/javascript" src="mootools.js?1232382056" ></script>
	  <script type="text/javascript" src="index.js?1232382056"></script>	
	  <div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
				<div id="screenshot_image"></div>
	  </div>

<div class="closure"></div>	
	</div>
    
</body>
</html>