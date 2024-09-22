<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<title>Empire of War</title>
	<link rel="icon" href="../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../graphic/icons/rabe.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/game.css" />
	<script type="text/javascript">
		if(top!=self) top.location=self.location;
	</script>
</head>
<body>
<table align="center" cellspacing="0" cellpaddin="0" border="0">
	<tr>
		<td width="100"></td>
		<td width="7" height="8" style="background-image: url(../graphic/border/r1.png);"></td>
		<td style="background-image: url(../graphic/border/r2.png);"></td>
		<td width="7" style="background-image: url(../graphic/border/r3.png);"></td>
		<td width="100"></td>
	</tr>
	<tr>
		<td></td>
		<td width="7" style="background-image: url(../graphic/border/r4.png);"></td>
		<td><img alt="Br-TWLan" src="../graphic/layout/logo.png"/></td>
		<td width="7" style="background-image: url(../graphic/border/r5.png);"></td>
	</tr>
	<tr>
		<td></td>
		<td height="7" style="background-image: url(../graphic/border/r6.png);"></td>
		<td style="background-image: url(../graphic/border/r7.png);"></td>
		<td style="background-image: url(../graphic/border/r8.png);"></td>
		<td></td>
	</tr>
</table>
<div align="center">
	<table class="blind">
		<tr>
			<td valign="top">
				<table class="blind" cellspacing="0" style="margin:6px">
					<tr>
						<td width="8" height="8" style="background-image:url(../graphic/border/r1.png);"></td>
						<td style="background-image:url(../graphic/border/r2.png);"></td>
						<td width="8" style="background-image:url(../graphic/border/r3.png);"></td>
					</tr>
					<tr>
						<td style="background-image:url(../graphic/border/r4.png);"></td>
						<td class="in_border">
							<table class="intro" width="450">
								<tr>
									<td valign="top"><img src="../graphic/icons/rabe_80x80.png" style="float:left; padding-right:10px" alt="" /><strong>Br-TWLan</strong> &eacute; um jogo em browser baseado na era medieva, e tem como principal objetivo o dominio do mundo por uma s&oacute; tribo.</td>
									<td rowspan="2" valign="top" width="120">
										<ul style="padding-left:12px; margin:0px 0px 20px">
											<li>{$players} Jogadores</li>
											<li>1 Mundo</li>
											<li>Novo layout</li>
											<li>graphische Dorf&uuml;bersicht</li>
										</ul>
										<div style="line-height:1em;font-size:12px"><a href="intro.php">&raquo; informa&ccedil;&otilde;es</a><br />
										<span style="font-size:9px; font-weight:bold; font-style:italic">(imagens do jogo)</span></div>
									</td>
								</tr>
								<tr>
									<td>
										<table class="blind" cellspacing="">
											<tr>
												<td>Desenvolva sua aldeia, fa&ccedil;a parte de uma tribo,<br />conhe&ccedil;a novos amigos, derrote seus inimigos!</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center"><a style="font-size:16pt;" href="register.php?ref=start">&raquo; REGISTRE-SE GRATIS &laquo;</a></td>
								</tr>
							</table>
						</td>
						<td style="background-image:url(../graphic/border/r5.png);"></td>
					</tr>
					<tr>
						<td height="8" style="background-image:url(../graphic/border/r6.png);"></td>
						<td style="background-image:url(../graphic/border/r7.png);"></td>
						<td style="background-image:url(../graphic/border/r8.png);"></td>
					</tr>
				</table>
			</td>
			<td valign="top">
				<table class="blind" cellspacing="0" style="margin:6px">
					<tr>
						<td width="8" height="8" style="background-image:url(../graphic/border/r1.png);"></td>
						<td style="background-image:url(../graphic/border/r2.png);"></td>
						<td width="8" style="background-image:url(../graphic/border/r3.png);"></td>
					</tr>
					<tr>
						<td style="background-image:url(../graphic/border/r4.png);"></td>
						<td>
							<form action="index.php?action=login" method="post">
								<table class="in_border" width="252">
									<tr><td colspan="2" align="center"><h4 style="margin-bottom:0px;">Br-TWLan - Acesso</h4></td></tr>
								{if !empty($error)}
									<tr><td colspan="2"><div class="error">{$error|replace:"Account nicht vorhanden.":"Conta inexistente."|replace:"Passwort ungültig.":"Senha inv&aacute;lida."|replace:"Account wurde gesperrt.":"Conta banida."}</div></td></tr>
								{/if}
								{if $row_login.login_locked == 'yes'}
									<tr><td colspan="2"><h3>No momento o acesso est&aacute; indisponivel!</h3></td></tr>
								{else}
									<tr><td align="right">Nome de usu&aacute;rio:</td><td><input name="user" type="text" size="15" maxlength="30" value=""/></td></tr>
									<tr><td align="right">Senha:</td><td><input name="password" type="password" size="15" maxlength="20" /></td></tr>
									<tr><td></td></tr>
									<tr><td colspan="2" align="right">
										<input type="submit" value="Acessar" class="button" />
									</td></tr>
									<tr><td colspan="2"><input id="cookie" type="checkbox" name="cookie" value="true"  /><label for="cookie">Lembrar-me</label></td></tr>
								{/if}
								</table>
							</form>
						</td>
						<td style="background-image:url(../graphic/border/r5.png);"></td>
					</tr>
					<tr>
						<td height="8" style="background-image:url(../graphic/border/r6.png);"></td>
						<td style="background-image:url(../graphic/border/r7.png);"></td>
						<td style="background-image:url(../graphic/border/r8.png);"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div style="margin-top:15px;margin-bottom:15px">
		<a href="help.php">Ajuda</a> - 
		<a href="http://www.twlan.org">F&oacute;rum</a> - 
		<a href="sds_rounds.php">Rounds salvos</a> - 
		<a href="first_steps.php">Primeiro passo</a> - 
		<a href="stats.php">Estat&iacute;sticas</a> - 
		<a href="impressum.php">Desenvolvimento</a>
	</div>
	{if count($announcement)>0}
	<table class="blind" cellspacing="0" style="margin:6px">
		<tr>
			<td width="8" height="8" style="background-image:url(../graphic/border/r1.png);"></td>
			<td style="background-image:url(../graphic/border/r2.png);"></td>
			<td width="8" style="background-image:url(../graphic/border/r3.png);"></td>
		</tr>
		<tr>
			<td style="background-image:url(../graphic/border/r4.png);"></td>
			<td>
				<table class="vis" width="450">
				{foreach from=$announcement item=item key=f_id}
					<tr>
						<td align="center" width="5"><img src="../graphic/minibutton/{$announcement.$f_id.graphic}.png" /></td>
						<td align="left">{$announcement.$f_id.text}<br />
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
								{if !empty($announcement.$f_id.link)}
									<td align="left" style="font-size: xx-small;"><a href="{$announcement.$f_id.link}">&raquo; mais</a></td>
								{/if}
									<td align="right" style="font-size: xx-small;">{$announcement.$f_id.time}</td>
								</tr>
							</table>
						</td>
					</tr>
				{/foreach}
				</table>
			</td>
			<td style="background-image:url(../graphic/border/r5.png);"></td>
		</tr>
		<tr>
			<td height="8" style="background-image:url(../graphic/border/r6.png);"></td>
			<td style="background-image:url(../graphic/border/r7.png);"></td>
			<td style="background-image:url(../graphic/border/r8.png);"></td>
		</tr>
	</table>
	{/if}
</div>
</body>
</html>