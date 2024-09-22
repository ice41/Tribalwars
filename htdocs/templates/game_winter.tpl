<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$village.name} ({$village.x}|{$village.y}) - Die St&auml;mme</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
<script src="menu.js?1148466057" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">

{if $intro}
      <script src="http://add.gfx-dose.de/layer.js/dslan-intern" type="text/javascript"></script>
{/if}

{if $user.dyn_menu==1}
	<table class="menu nowrap" align="center" width="{$user.window_width}">
	<tr id="menu_row">
	<td><a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Ausloggen</a></td>
	<td><a href="http://dslan.gfx-dose.de" target="_blank">DSLAN Forum</a></td>
	<td><a href="help.php" target="_blank">Hilfe</a></td>
	<td><a href="game.php?village={$village.id}&amp;screen=settings">Einstellungen</a><br /><table cellspacing="0" width="120"><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">Profil</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">Einstellungen</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=move">Neu anfangen</a></td></tr><tr><td><a href="game.php?village={$village.id}&screen=settings&mode=quickbar">Schnellleiste bearbeiten</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation">Urlaubsmodus</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">Logins</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">Passwort &auml;ndern</a></td></tr></table></td>
	<td><a href="game.php?village={$village.id}&amp;screen=ranking">Rangliste</a> ({$user.rang}.|{$user.points|format_number} P) <br /><table cellspacing="0" width="120"><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally">St&auml;mme</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player">Spieler</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player">Besiegte Gegner</a></td></tr></table>
	<td> <a href="game.php?village={$village.id}&amp;screen=ally">Stamm</a>{if $user.ally!=-1}<br /><table cellspacing="0" width="120"><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">&Uuml;bersicht</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Profil</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Mitglieder</a></td></tr>{if $user.ally_invite==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invites">Einladungen</a></td></tr>{/if}{if $user.ally_diplomacy==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">Eigenschaften</a></td></tr>{/if}</table>{/if}</td>
	<td><a href="game.php?village={$village.id}&amp;screen=report">{if $user.new_report==1}<img src="graphic/new_report.png" title="Neuer Bericht" alt="" />{/if} Berichte</a><br /><table cellspacing="0" width="120"><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">Alle Berichte</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">Angriffe</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">Verteidigung</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">Unterst&uuml;tzung</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">Handel</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">Sonstiges</a></td></tr></table></td>
	<td><a href="game.php?village={$village.id}&amp;screen=mail">{if $user.new_mail==1}<img src="graphic/new_mail.png" title="Neue Nachricht" alt="" /> {/if} Nachrichten</a><br /><table cellspacing="0" width="120"><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Posteingang</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">Postausgang</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">Archiv</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">Nachricht schreiben</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Absender blockieren</a></td></tr></table></td>
	<td><a href="game.php?village={$village.id}&amp;screen=memo">Notizen</a></td></tr>
	</table>
	
	
	
	
	{if $user.show_toolbar==1}
	
	{php}require_once("quickbar.php");{/php}
		
	{/if}
	
	
	<hr width="{$user.window_width}" size="2" />
	
	<table align="center" width="{$user.window_width}" cellspacing="0" style="padding:0px;margin-bottom:4px">
	<tr>
	<td>
	
	
		<table class="menu nowrap" align="left">
		<tr id="menu_row2">
		<td><a href="game.php?village={$village.id}&amp;screen=overview_villages" accesskey="s">&Uuml;bersichten</a><br /><table cellspacing="0" width="120"><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">Kombiniert</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">Produktion</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">Truppen</a></td></tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">Befehle</a></td></tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">Eintreffend</a></td></tr></td></table>
		<td><a href="game.php?village={$village.id}&amp;screen=map">Karte</a></td>
		<td class="no_hover">
		{if $user.villages>1}
			{if !empty($village_array.last)}
				<a href="{$village_array.last_link}" accesskey="a"><img src="graphic/links.png" alt="" /></a> 
			{else}
				<img src="graphic/links2.png" alt="" />
			{/if}
			{if !empty($village_array.next)}
				<a href="{$village_array.next_link}" accesskey="d"><img src="graphic/rechts.png" alt="" /></a> 
			{else}
				<img src="graphic/rechts2.png" alt="" />
			{/if}
		{/if}	
		</td>
		<td><a href="game.php?village={$village.id}&amp;screen=overview">{$village.name}</a> <b>({$village.x}|{$village.y}) K{$village.continent}</b></td>
			</tr>
		</table>
		
	</td>
	
	<td align="right"><table cellspacing="0"><tr>
	<td><table class="box" cellspacing="0"><tr>
	<td><a href="game.php?village={$village.id}&amp;screen=wood"><img src="graphic/holz.png" title="Holz" alt="" /></a></td>
	<td><span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>{$village.r_wood}</span>&nbsp;</td>
	<td><a href="game.php?village={$village.id}&amp;screen=stone"><img src="graphic/lehm.png" title="Lehm" alt="" /></a></td>
	<td><span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>{$village.r_stone}</span>&nbsp;</td>
	<td><a href="game.php?village={$village.id}&amp;screen=iron"><img src="graphic/eisen.png" title="Eisen" alt="" /></a></td>
	<td><span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>{$village.r_iron}</span></td>
	<td style="border-left: dotted 1px;">
	&nbsp;<a href="game.php?village={$village.id}&amp;screen=storage"><img src="graphic/res.png" title="Speicherkapazit&auml;t" alt="" /></a>
	</td><td id="storage">{$max_storage} </td>
	</tr></table></td>
	
	<td><table class="box" cellspacing="0"><tr>
	<td width="18" height="20" align="center"><a href="game.php?village={$village.id}&amp;screen=farm"><img src="graphic/face.png" title="Arbeiter" alt="" /></a></td>
	<td align="center">{$village.r_bh}/{$max_bh}</td>
	</tr></table></td>

	{if $user.attacks!=0}
		<td><table class="box" cellspacing="0"><tr>
		<td width="60" height="20" align="center"><img src="graphic/unit/att.png" alt="" /> ({$user.attacks})</td>
		</tr></table></td>
	{/if}
	
	</tr></table></td>
	
	</tr></table>
	
	<!--[if IE ]>
	<script type="text/javascript">initMenuList("menu_row");</script>
	<script type="text/javascript">initMenuList("menu_row2");</script>
	<![endif]-->

{else}
	<table align="center">
	<tr><td>
	<a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Ausloggen</a>
	- <a href="http://dslan.gfx-dose.de" target="_blank">DSLAN Forum</a>
	- <a href="help.php" target="_blank">Hilfe</a>
	- <a href="game.php?village={$village.id}&amp;screen=settings">Einstellungen</a>
	- <a href="game.php?village={$village.id}&amp;screen=ranking">Rangliste</a> ({$user.rang}.|{$user.points|format_number} P) 
	-  <a href="game.php?village={$village.id}&amp;screen=ally">Stamm</a> 
	- <a href="game.php?village={$village.id}&amp;screen=report">{if $user.new_report==1}<img src="graphic/new_report.png" title="Neuer Bericht" alt="" />{/if} Berichte</a>
	- <a id="menu_mail" href="game.php?village={$village.id}&amp;screen=mail">{if $user.new_mail==1}<img src="graphic/new_mail.png" title="Neue Nachricht" alt="" /> {/if} Nachrichten</a>
	- <a href="game.php?village={$village.id}&amp;screen=memo">Notizen</a>
	</td></tr></table>
	
	
	
	
	{if $user.show_toolbar==1}
		<br />
		<table id="quickbar" class="menu nowrap" align="center">
		<tr>
			<td><a href="game.php?village={$village.id}&amp;screen=main" ><img src="graphic/buildings/main.png" alt="" />Hauptgeb&auml;ude</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=barracks" ><img src="graphic/buildings/barracks.png" alt="" />Kaserne</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=stable" ><img src="graphic/buildings/stable.png" alt="" />Stall</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=garage" ><img src="graphic/buildings/garage.png" alt="" />Werkstatt</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=snob" ><img src="graphic/buildings/snob.png" alt="" />Adelshof</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=smith" ><img src="graphic/buildings/smith.png" alt="" />Schmiede</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=place" ><img src="graphic/buildings/place.png" alt="" />Platz</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=market" ><img src="graphic/buildings/market.png" alt="" />Markt</a></td>
		</tr>
		</table>
	{/if}
	
	<hr width="{$user.window_width}" size="2" />
	
	<table align="center" width="{$user.window_width}" cellspacing="0" style="padding:0px;margin-bottom:4px">
	<tr>
	<td>
		{if $user.villages>1}
			{if !empty($village_array.last)}
				<a href="{$village_array.last_link}" accesskey="a"><img src="graphic/links.png" alt="" /></a> 
			{else}
				<img src="graphic/links2.png" alt="" />
			{/if}
			{if !empty($village_array.next)}
				<a href="{$village_array.next_link}" accesskey="d"><img src="graphic/rechts.png" alt="" /></a> 
			{else}
				<img src="graphic/rechts2.png" alt="" />
			{/if}
		{/if}
		<a href="game.php?village={$village.id}&amp;screen=overview_villages" accesskey="s">{$village.name}</a> <b>({$village.x}|{$village.y}) K{$village.continent}</b> - 
		<a href="game.php?village={$village.id}&amp;screen=map">Karte</a> - 
		<a href="game.php?village={$village.id}&amp;screen=overview">Dorf&uuml;bersicht</a>
		
	</td>
	
	<td align="right"><table cellspacing="0"><tr>
	<td><table class="box" cellspacing="0"><tr>
	<td><a href="game.php?village={$village.id}&amp;screen=wood"><img src="graphic/holz.png" title="Holz" alt="" /></a></td>
	<td><span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>{$village.r_wood}</span>&nbsp;</td>
	<td><a href="game.php?village={$village.id}&amp;screen=stone"><img src="graphic/lehm.png" title="Lehm" alt="" /></a></td>
	<td><span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>{$village.r_stone}</span>&nbsp;</td>
	<td><a href="game.php?village={$village.id}&amp;screen=iron"><img src="graphic/eisen.png" title="Eisen" alt="" /></a></td>
	<td><span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>{$village.r_iron}</span></td>
	<td style="border-left: dotted 1px;">
	&nbsp;<a href="game.php?village={$village.id}&amp;screen=storage"><img src="graphic/res.png" title="Speicherkapazit&auml;t" alt="" /></a>
	</td><td id="storage">{$max_storage} </td>
	</tr></table></td>
	
	<td><table class="box" cellspacing="0"><tr>
	<td width="18" height="20" align="center"><a href="game.php?village={$village.id}&amp;screen=farm"><img src="graphic/face.png" title="Arbeiter" alt="" /></a></td>
	<td align="center">{$village.r_bh}/{$max_bh}</td>
	</tr></table></td>
	
	{if $user.attacks!=0}
		<td><table class="box" cellspacing="0"><tr>
		<td width="60" height="20" align="center"><img src="graphic/unit/att.png" alt="" /> ({$user.attacks})</td>
		</tr></table></td>
	{/if}
	
	</tr></table></td>
	
	</tr></table>
{/if}





{if $config.no_actions}
	<table class="main" width="{$user.window_width}" align="center">
	<tr>
	<td style="padding:2px;">
	<b>ACHTUNG:</b> Es wurde in der Spielekonfigurationsdatei eingestellt, dass keine Aktionen (Geb&auml;ude bauen, Forschen, Rekrutieren,...) ausgef&uuml;hrt werden können! St&auml;mme können trotzdem noch erstellt werden.
	</td>
	</tr>
	</table>
	<br />
{/if}

<table class="main" width="{$user.window_width}" align="center">
<tr>
<td style="padding:2px;">
{if in_array($screen,$allow_screens)}
	{include file="game_$screen.tpl"}
{/if}
<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">generiert in {$load_msec}ms
Serverzeit: <span id="serverTime">{$servertime}</span></p>
</td>
</tr>
</table>

<script type="text/javascript">startTimer();</script>
</body>
</html>