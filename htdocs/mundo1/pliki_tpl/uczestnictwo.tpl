<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<title>Tribos</title>



					<meta id="og_description" property="og:description" content="Tribos"/>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Tribos é um jogo de navegador online. Cada jogador tem uma pequena aldeia para levar ao poder e à glória." />
		<meta name="keywords" content="Jogo online, Jogos online, Jogo de navegador, jogos de navegador, jogos, wiki, pl games, estatísticas, Multijogador, grátis, grátis, grátis, estratégia, Idade Média, fórum" />
		<link rel="stylesheet" type="text/css" href="../index_new.css" />

		<script type="text/javascript" src="../js/index.js"></script>

						

	</head>

	<body>
	

		<div id="index_body">
			<div id="main">
						<div id="header">
				<h1>
					<a href="/index.php" style="background:url(../ds_graphic/index/bg-logo.jpg) no-repeat 100% 0;"
						
					</a>
				</h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="../rules.php">Regras</a> - 
<a href="../team.php">Equipa</a> - <a href="../hall_of_fame.php">Hall da Fama</a> 
							</div>
						</div>
				</div>
				</div>
							</div>
			
<div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container"><div id="content" class="content_no_paladin" style="padding-left: 30px; padding-right: 30px">

	<h2 style="margin-bottom: 10px">
		Registro do mundo {$serwer}
		</h2>


		<p>Quer participar do <strong>mundo {$serwer}</strong>?</p>
	
			<div style="float: right">
	<img src="../ds_graphic/axe.png" title="" alt="" class="" />
	</div>
		<table class="vis" style="margin-bottom: 5px; border:1px solid #000; width: 450px"><tr><td>
	<font color="green">Estilo 4.0 (aldeias barbaras,{if $monety}moedas{/if}{if $poziom_palacu}A academia tem 3 níveis{/if}, Arqueiros, arqueiros a cavalo, Paladino com itens,
	{if $wioski_start == 1}{$wioski_start} Aldeia inicial{/if}
	{if $wioski_start == 2 || $wioski_start == 3 || $wioski_start == 4}{$wioski_start} Aldeia inicial{/if}
	{if $wioski_start >= 5}{$wioski_start} Aldeia inicial{/if}
	<b>{if $kosciol}Igreja e monges{else}sem igreja{/if}</b>)</font>
	<br>{if $noc}Noite: {$noc1}-{$noc2}{else}Sem bônus noturno{/if}<br>
<font color="red">Velocidade: {$speed}</font>
	</td></tr></table>
	

	
	


				<p id="direction_info">
	
		</p>

	{if $rejestracja_nowych_graczy}





<form method="post" action="uczestnictwo.php?action=accept_uczestnictwo">
		<input type="submit" value="Participar" />
</form>
{else}
<h4><font color="red">{$err}</font></h4>
{/if}	

		


	
	



</div>
				</div>
			<div class="container-bottom-full"></div>
		 </div>
		</div><!-- content -->
					<div class="closure">
				&copy; 2003 - 2022 <a target="_blank" href="https://www.ice41,pt">ice41.pt</a> &middot; 
				<a target="_blank" href="http://www.innogames.com/pl">InnoGames GmbH</a> &middot;				<a href="http://legal.innogames.de/staemme/pl/imprint" target="_blank">Kontakt</a> &middot;
				<a href="http://legal.innogames.de/staemme/pl/privacy" target="_blank">Ochrona prywatno�ci</a>
				&middot; <a href="http://legal.innogames.de/staemme/pl/agb" target="_blank">OWH</a>
				&middot; <a href="http://www.plemiona.pl/news.php?type=rss2.0"><img src="https://www.tribalwars.net/graphic/index/icon_rss.png?ed0e8" alt="RSS" border="0" style="vertical-align:text-bottom;" /></a><br />

                
                			</div>
	</body>
</html>


