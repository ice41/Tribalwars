<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - gra online</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<link rel="stylesheet" type="text/css" href="start.css" />
		<meta name="description" content="Die St&auml;mme ist ein Browsergame. Jeder Spieler ist Herrscher eines kleinen Dorfes, dem er zu Ruhm und Macht verhelfen soll." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="/index.css?1232382056" />
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

	<body>

<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/index.php" style="background:url(/graphic/index/bg-logo.jpg) no-repeat 100% 0;">Triburile - Jocul online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://wiki.triburile.ro/">Wiki</a> - <a href="help.php">Ajutor</a>  - <a href="rules.php">Reguli de joc</a>  - <a href="/forum">Forum</a>  - <a href="support.php">Suport</a>  - <a href="team.php">Echipa</a>  - <a href="stats.php">Statistic&#259;</a>
							</div>
						</div>
				</div>
				</div>
							</div><div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container">
					<table>
						<tr>
							<td valign="top">
								<table class="vis" style="margin:0 18px 0 12px;">
										<tr><td  style="width:65px;"><a href="/serwer_1/stat.php">Świat 1</a></td></tr>
										<tr><td  style="width:65px;"><a href="/serwer_2/stat.php">Świat 2</a></td></tr>
												
																	</table>
							</td>
							<td valign="top">
								<h2>Statystyki Świat 1</h2>
								<h3><a href="guest.php" target="_top">&raquo; Dostęp gościnny</a> <a href="stat.php?mode=settings" target="_top">&raquo; Ustawienia świata</a></h3><br />

								<table class="vis" width="98%">
									<tr><th>Liczba graczy:</th><th>{$players}</th></tr>
									<tr><td>Liczba wiosek:</td><td>{$villages} ({$vpp} na gracza)</td></tr>
								</table>
								<br />

								<table class="vis" width="98%">
									<tr><th style="width:150px">Poniższe dane zostały obliczone</th>
									<th>dzisiaj o {$time}</th></tr>
									<tr><td>Liczba wysłanych wiadomości:</td><td>{$mail} ({$mpp} na gracza)</td></tr>

									<tr><td>Liczba punktów (ogólnie):</td><td>{$points} ({$ppp} na gracza, {$ppv} na wioskę)</td></tr>

									<tr><td>Ilość surowców (ogólnie):</td><td><img src="/ds_graphic/holz.png" title="Lemn" alt="" />{$wood} <img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$stone} <img src="/ds_graphic/eisen.png" title="Fier" alt="" />{$iron} </td></tr>
									<tr><td>Ludność (ogólnie):</td><td><span class="icon header population"> </span> {$bh}</td></tr>

									<tr>
										<tr><td>Jednostki (ogólnie):</td>
<td>
<table><tr>
<th width="45"><img src="/ds_graphic/unit/unit_spear.png" title="Lancier" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_sword.png" title="Luptator cu spada" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_axe.png" title="Luptator cu toporul" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_spy.png" title="Spion" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_light.png" title="Cavalerie usoara" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_heavy.png" title="Cavalerie Grea" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_ram.png" title="Berbec" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/ds_graphic/unit/unit_snob.png" title="Nobil" alt="" /></th>
</tr><tr>

{foreach from=$unitsAll item=unitsAll}
{if $unitsAll == 0}
<td class="hidden">{$unitsAll}</td>
{else}
<td>{$unitsAll}</td>
{/if}
{/foreach}
</tr></table>
</td></tr>

<tr>
  <td>Średnia jednostek na gracza:</td>
  <td>
<table><tr>
<th width="45"><img src="/ds_graphic/unit/unit_spear.png" title="Lancier" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_sword.png" title="Luptator cu spada" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_axe.png" title="Luptator cu toporul" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_spy.png" title="Spion" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_light.png" title="Cavalerie usoara" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_heavy.png" title="Cavalerie Grea" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_ram.png" title="Berbec" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/ds_graphic/unit/unit_snob.png" title="Nobil" alt="" /></th>
</tr><tr>
{foreach from=$unitsPlayer item=unitsPlayer}
{if $unitsPlayer == 0}
<td class="hidden">{$unitsPlayer}</td>
{else}
<td>{$unitsPlayer}</td>
{/if}
{/foreach}

</tr></table>
</td></tr>

<tr>
<td>Średnia jednostek na wioskę:</td>
<td>
<table><tr>
<th width="45"><img src="/ds_graphic/unit/unit_spear.png" title="Lancier" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_sword.png" title="Luptator cu spada" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_axe.png" title="Luptator cu toporul" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_spy.png" title="Spion" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_light.png" title="Cavalerie usoara" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_heavy.png" title="Cavalerie Grea" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_ram.png" title="Berbec" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/ds_graphic/unit/unit_snob.png" title="Nobil" alt="" /></th>
</tr><tr>
{foreach from=$unitsVillage item=unitsVillage}
{if $unitsVillage == 0}
<td class="hidden">{$unitsVillage}</td>
{else}
<td>{$unitsVillage}</td>
{/if}
{/foreach}
</tr></table>
</td></tr>

</table>

</td></tr></table>

</td></tr></table>
				</div>
			<div class="container-bottom-full"></div>
		 </div>
		</div><!-- content -->
					<div class="closure">
				&copy; 2012 &middot;		

                                
                			</div>	</body>
</html>