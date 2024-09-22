<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Construir nova aldeia - Empire of War</title>
	<link rel="icon" href="../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../graphic/icons/rabe.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/game.css" />
	<script src="../js/script.js" type="text/javascript"></script>
</head>
<body>
<table class="main" width="800" align="center">
	<tr>
		<td>
			<h3 style="margin-bottom:10px;">Construir nova aldeia</h3>
			{if !empty($ennobled_by)}
			{php}
				$sid = mysql_real_escape_string($_COOKIE['session']);
				$select = mysql_fetch_array(mysql_query("SELECT * FROM `sessions` WHERE `sid` = '".$sid."'"));
				include('include/config.php');
				$sum = 100-$config['ennobled_protection'];
				$total = round($config['noob_protection_v1']/100*$sum);
				$total = time()+$total*60;
				mysql_query("UPDATE `users` SET `noob_protection` = '".$total."' WHERE `id` = '".$select['userid']."'");
			{/php}
			<div class="error">Voc&ecirc; teve sua &uacute;ltima/&uacute;nica aldeia dominada por {$ennobled_by}. Felizmente alguns de seus guerreiros sobreviveram e est&atilde;o dispostos a combater este jogador e retomar o que &eacute; seu por direito. Caso queira entrar nesta guerra...</div>
			{/if}
			<br />
			<table class="vis" width="100%" cellspacing="0" align="center" style="border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Em que dire&ccedil;&atilde;o deseja que sua nova aldeia seja criada?</th></tr>
				<tr>
					<td width="200">
						<form action="create_village.php?action=create" method="post">
							<table width="100%" align="center" cellspacing="0" style="border:2px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
								<tr><th style="text-align:center;">#</th><th style="text-align:center;">Dire&ccedil;&atilde;o</th></tr>
								<tr class="lit">
									<td align="center"><input type="radio" name="direction" value="random" checked="checked" /></td>
									<td align="center">Aleat&oacute;rio</td>
								</tr>
								<tr class="lit">
									<td align="center"><input type="radio" name="direction" value="nw" /></td>
									<td align="center">Noroeste</td>
								</tr>
								<tr class="lit">
									<td align="center"><input type="radio" name="direction" value="no" /></td>
									<td align="center">Nordeste</td>
								</tr>
								<tr class="lit">
									<td align="center"><input type="radio" name="direction" value="sw" /></td>
									<td align="center">Sudoeste</td>
								</tr>
								<tr class="lit">
									<td align="center"><input type="radio" name="direction" value="so" /></td>
									<td align="center">Sudeste</td>
								</tr>
								<tr><th colspan="2"><span style="float:right;"><input type="submit" value="Confirmar" class="button" /></span></th></tr>
							</table>
						</form>
					</td>
					<td align="center"><img src="../graphic/richtung/richtung.png" alt="" /></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table class="corp" style="width:800px;" align="center">
	<tr>
		<td class="corp_s"></td>
		<td class="header" width="90%"></td>
		<td class="corp_s"></td>
	</tr>
</table>
<table class="main" width="800" align="center">
	<tr><th style="text-align:center;">&copy;{php}echo date('Y');{/php} | Empire of War - Todos os direitos reservados - <a href="http://LanServers.tk" target="_blank">LanServers</a></th></tr>
</table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>