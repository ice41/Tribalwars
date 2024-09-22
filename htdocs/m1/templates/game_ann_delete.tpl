<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>{$village.name} ({$village.x}|{$village.y}) K{$village.continent} - Br-TWLan</title>
	<link rel="stylesheet" href="../css/game.css" type="text/css" />
	<link rel="icon" href="../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../graphic/icons/rabe.png" type="image/x-icon">
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/func.js"></script>
	{php}if($_GET['mode'] != 'forum'){echo "<meta http-equiv=\"refresh\" content=\"250\">\r\n";}{/php}
	<script type="text/javascript">
		var vid = {$village.id};
		var act_vid = {$village.id};
		var act_points = {$user.points};
		var userid = {$user.id};
		var storage = {$max_storage};
	</script>
	<!--[if IE 6]>
		<script type="text/javascript">document.execCommand("BackgroundImageCache",false,true);</script>
	<![endif]-->
	<!--[if IE ]>
		<script type="text/javascript">initMenuList("menu_row");</script>
		<script type="text/javascript">initMenuList("menu_row2");</script>
	<![endif]-->
</head>
<body> 
<table class="navi-border" width="100%" style="margin:auto; margin-top: 25px; border-collapse: collapse;"> 
	<tr> 
		<td> 
			<table class="main" width="100%" align="center"> 
				<tr> 
					<td>
						<h2>Conta em processo de exclus&atilde;o...</h2> 
						Sua conta ser&aacute; excluida, portanto o acesso a conta est&aacute; bloqueado.<br />
						<p>
							<a href="game.php?village={$village.id}&amp;screen=overview&amp;action=backup">&raquo; Cancelar esxclus&atilde;o</a><br />
							<a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}">&raquo; Sair</a>
						</p>
						<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px"><span style="float:right;">Gerado em {$load_msec}ms | Hora do Servidor: <span id="serverTime">{$servertime}</span> | {php}echo date("d.m.Y");{/php}</span></p>
					</td>
				</tr>
			</table> 
		</td>
	</tr>
</table>
</body>