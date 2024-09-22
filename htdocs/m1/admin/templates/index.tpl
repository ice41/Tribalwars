<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Painel Administrativo - Empire of War</title>
	<link rel="stylesheet" href="../../css/game.css" type="text/css" />
	<link rel="icon" href="../../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../../graphic/icons/rabe.png" type="image/x-icon">
	<script type="text/javascript" src="../../js/script.js"></script>
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/func.js"></script>
</head>
<body>
<table cellspacing="0" width="100%">
	<tr>
		<td width="250" valign="top">
			<table class="main" width="100%">
				<tr>
					<td>
						<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
							<tr><th>Utile</th></tr>
							<tr><td><a href="index.php?screen=startpage">Anunturi pe prima pagina</a></td></tr>
							<tr><td><a href="index.php?screen=refugee_camp">Sate parasite</a></td></tr>
							<tr><td><a href="index.php?screen=mass_mail">Trimite mesaj la toti jucatori</a></td></tr>
							<tr><td><a href="index.php?screen=start_buildings">Nivelul cladirilor la inceput</a></td></tr>
							<tr><td><a href="index.php?screen=reset">Restartare server</a></td></tr>
							<tr><td><a href="index.php?screen=debugger">Reparare - Debugger</a></td></tr>
							<tr><td><a href="index.php?screen=logs">Logs</a></td></tr>
							<tr><td><a href="index.php?action=logout">Logout admin</a></td></tr>
						</table><br />
						{if count($extern_menue)!=0}
						<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
							<tr><th>Tool-uri</th></tr>
							{foreach from=$extern_menue item=link key=name}
							<tr><td{if $screen==$link} class="selected"{/if}><a href="index.php?screen={$link}">{$name}</a></td></tr>
							{/foreach}
						 </table>
						{/if}
					</td>
				</tr>
			</table>
		</td>
		<td width="*" valign="top">
			<table class="main" width="98%" align="center">
				<tr>
					<td style="padding:2px;">
					{if $screen == 'mass_mail'}
						{include file="index_mass_mail.tpl"}
					{elseif in_array($screen,$allow_screens)}
						{include file="index_$screen.tpl" title=foo}
					{/if}
						<p align="right" style="font-size: 10px; margin-top:0px; margin-bottom:0px">Gerado em {$load_msec}ms | 
						Hora do Servidor: <span id="serverTime">{$servertime}</span> | {php}echo date("d.m.Y");{/php}</p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">startTimer();</script>
</body>
</html>