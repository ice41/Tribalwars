<?php /* Smarty version 2.6.14, created on 2012-12-29 10:59:46
         compiled from ../templates/index.tpl */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
	</head>				
			</div>
		</div>
		<div id="index_body">
			<div id="main">
			  <div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Die St&auml;mme</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://wiki.triburile.ro/">Wiki</a> - <a href="/help/index.php">Ajutor</a>  - <a href="rules.php">Reguli de joc</a>  - <a href="http://www.twlan.hi2.ro">Forum</a> - <a href="team.php">Echipa</a>  - <a href="stats.php">Statistic&#259;</a>
							</div>
						</div>
					</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin.png" alt="" /></span>						</div>				<div id="content">
					<div class="container-block">
						<div class="container-top"></div>
						<div class="container">
															<div class="info-block">
	<h2>Triburile</h2>
								<p>Triburile este un joc online, care se petrece &icirc;n evul mediu. Fiecare juc&#259;tor este st&#259;p&#226;nul unui mic sat, pe care &icirc;l aduce la faim&#259; &#351;i putere.</p>

																		<a class="btn-kostenlos-anmelden" href="register.php">&#206;nscrie-te acum gratis!</a>
																		<strong>Imagini din jocul pe browser:</strong>
									<ul class="screenshots">
										<li><a href="javascript:toggle_screenshot(1)"><img src="graphic/index/tribalwars-map.png" alt="Browser game Tribal Wars: World map" /></a></li>
										<li><a href="javascript:toggle_screenshot(2)"><img src="graphic/index/tribalwars-rally-point.png" alt="Browser game Tribal Wars: The rally point" /></a></li>
										<li class="last"><a href="javascript:toggle_screenshot(3)"><img src="graphic/index/tribalwars-paladin.png" alt="Browser game Tribal Wars: The paladin" /></a></li>
									</ul>
								<br style="clear:both;" />
								<strong style="padding-top:10px;">Particip&#259; deja 6.589 juc&#259;tori!</strong>	
</div>														<div class="login-block">
	<h2 style="text-align:left;margin-bottom:15px;">Triburile - Login</h2>
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
											                        <option value="ro1" >Lumea 1</option>
						                        
						                        
						                </select>
	            </label>
			<input type="submit" value="" id="login-btn-input" onmouseover="javascript:hover_toggle_css('login-btn-input','login-btn-input-hover',false);return true;" onmouseout="javascript:hover_toggle_css('login-btn-input','login-btn-input-hover',false);return true;" />
			<br style="clear:both;"/>
			<p><label for="cookie" style="text-align:right;">
					<input id="cookie" type="checkbox" name="cookie" value="true"  />
					Login permanent
			</label></p>
			<p><a href="/lost_pw.php">Parola uitat&#259;/modificare</a></p>
		</div>
	</form>
</div>
						</div>
						<div class="container-bottom"></div>
					</div>
				</div><!-- content -->
											<div id="footer">
					
						</div><!-- content -->
											
						</div>
						
								<center><script type="text/javascript"><!--
google_ad_client = "ca-pub-3877711109190281";
/* 728x90, creat 18.04.2010 */
google_ad_slot = "4292111882";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>														</div>
																						
					<div class="footer-bottom"></div>
				</div><!-- footer -->
										<div class="closure">
								
                                
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