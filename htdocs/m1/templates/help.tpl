<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ajuda - Empire of War</title>
	<link rel="stylesheet" type="text/css" href="../css/game.css" />
	<script src="../js/script.js" type="text/javascript"></script>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
<body>
<table class="main" width="1000" align="center" style="margin-top:5px;">
	<tr>
		<td>
			<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Submenu</th></tr>
				{foreach from=$links item=f_mode key=f_name}
					{if $f_mode==$mode}
					<tr>
						<td class="selected" width="81"><a href="help.php?mode={$f_mode}">{if $f_mode==$mode}&raquo; {/if}{$f_name|replace:"Erste Schritte":"Base de conhecimento"|replace:"Später Beginn":"Iniciando no jogo"|replace:"Gebäude":"Edif&iacute;cios"|replace:"Einheiten":"Unidades"|replace:"Kampfsystem":"Sistema de batalha"|replace:"Punkte":"Tabela de pontos"|replace:"Karte":"Mapa"|replace:"Berichte":"Ralat&oacute;rios"|replace:"Stämme-Banner":"Banners"|replace:"Serverinfo":"Informa&ccedil;&otilde;es do servidor"}</a></td>
					</tr>
					{else}
					<tr>
						<td width="81"><a href="help.php?mode={$f_mode}">{$f_name|replace:"Erste Schritte":"Base de conhecimento"|replace:"Später Beginn":"Iniciando no jogo"|replace:"Gebäude":"Edif&iacute;cios"|replace:"Einheiten":"Unidades"|replace:"Kampfsystem":"Sistema de batalha"|replace:"Punkte":"Tabela de pontos"|replace:"Karte":"Mapa"|replace:"Berichte":"Ralat&oacute;rios"|replace:"Stämme-Banner":"Banners"|replace:"Serverinfo":"Informa&ccedil;&otilde;es do servidor"}</a></td>
					</tr>	
					{/if}
				{/foreach}
			</table>
		</td>
		<td width="78%">
			<h2>Ajuda</h2>
			{include file="help_$mode.tpl" title=foo}
		</td>
	</tr>
</table>
<table class="corp" style="width:1000px;" align="center">
	<tr>
		<td class="corp_s"></td>
		<td class="header" width="90%">
		</td>
		<td class="corp_s"></td>
	</tr>
</table>
<table class="main" width="1000" align="center">
	<tr><th style="text-align:center;">&copy;{php}echo date("Y");{/php} | Br-TWLan - Todos os direitos reservados</th></tr>
</table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>