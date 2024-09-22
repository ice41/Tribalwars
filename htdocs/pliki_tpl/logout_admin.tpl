<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Elitewars - gra online</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Elitewars to przegl¹darkowa gra online. Ka¿dy gracz posiada ma³¹ wioskê, któr¹ ma doprowadziæ do w³adzy i chwa³y." />
		<link rel="stylesheet" type="text/css" href="index.css" />
		<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
	</head>

	<body>	<div id="gamebar">
			<div id="gamebar_content">
				<div id="flag1_dropdown" style="display: inline;"><ul id="flags">Reklamy serwerów:
<li><a href=http://imperialtribes.pl><img src="ds_graphic/flags/pl.gif" alt="pl" />Newtribals.pl</a></li>
<li><a href=http://privatewars.pl><img src="ds_graphic/flags/pl.gif" alt="pl" />Privatewars.pl</a></li>
<li><a href=http://infernal-wars.com/ title="Serwer z przerobion¹ grafik¹, na którym jest konto premium"><img src="ds_graphic/flags/en.gif.png" alt="en" />InflateWars.com</a></li>
<li><a href=http://privek.pl/><img src="ds_graphic/flags/pl.gif" alt="pl"/> Privek.pl</a></ul>
              

<a href="#" onclick="javascript:toggle_visibility('flags')"> 
<img src="ds_graphic/flags/pl.gif" alt="pl" /><img src="ds_graphic/drop.png" alt="" /></a>
			    </div>
					

		  <a href="http://www.plemionawars.pl/index.php">Plemionawars</a> - <a href="support">Support</a> 	

				</div>
		</div>
							<div id="index_body">
			<div id="main">
						<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Elitewars - gra online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">

						<div class="navigation-wrapper">
							<div id="navigation_span">
								{php}
								$lcount = count($this->_tpl_vars["linki"]);
								{/php}
								{foreach from=$linki key=link item=value}
									{php}$i++{/php}
									<a href="{$link}"/>{$value}</a>
									{php} if ($lcount != $i) echo"-";{/php}
								{/foreach}
							</div>
						</div>
				</div>
				</div>
							</div>
							<div id="content">
					<div class="container-block">
						<div class="container-top"></div>

						<div class="container">
													<div class="info-block">
								<h2>Wylogowano pomyœlnie!</h2>
	<p>Zosta³eœ pomyœlnie wylogowany z panelu <a href="admin.php">admina</a>!														<br style="clear:both;" />
								 
							</div>
										</div>
						<div class="container-bottom"></div>
					</div>
				</div><!-- content -->
												{if count($ogloszenia) > 0}						
							<div id="footer">
					<div class="footer-header"></div>										<div class="footer-holder">
					
						{foreach from=$ogloszenia item=ogloszenie key=id}
							<div>
								<span class="{if $ogloszenie.typ != 0}global-{/if}news">{$ogloszenie.nazwa}</span>
								<strong>{$ogloszenie.data}</strong>
								<p>{$ogloszenie.text}</p>
							</div>
							
							{if count($ogloszenia) != $ogloszenie.counter}
								<div class="news-separator"></div>
							{/if}
						{/foreach}
																											</div>
					



<div class="footer-bottom"></div>

{/if}
				</div>



				</div><!-- footer -->
			

			</div><!-- main -->

			<script type="text/javascript" src="js/mootools.js" ></script>
			<script type="text/javascript" src="js/index.js"></script>	
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
				<div id="screenshot_image"></div>
			</div>
		</div>

			<div class="closure">&copy; 2013 &middot;</div>	
	</div>	

	</body>
</html>