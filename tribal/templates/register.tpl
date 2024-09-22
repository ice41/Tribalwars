<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos DarkGamesPT</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta name="description" content="Se teve, ou tem, uma conta em algum dos mundo, năo precisa registar-se novamente. Faça logon na Pagina inicial !" />
		<link rel="stylesheet" type="text/css" href="index.css" />
	</head>

	<body>
	

		<div id="index_body">
			<div id="main">
						<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Tribos DarkGamesPT</a></h1>
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
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>
						<div id="content">
				<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
					<div id="screenshot_image"></div>

				</div>
				<div class="container-block-full">
					<div class="container-top-full"></div>
					<div class="container">
						{if $mode == 'rejestracja'}
						<div class="info-block register" style="margin-left:10px">
															<h2>Registar no mundo {$serwer} <a href="world.php">&raquo; Escolher outro mundo</a></h2>

														<h3>Cada Jogador só pode ter uma conta por mundo!</h3>

							<p>Se já tem, ou teve, uma conta em algum outro mundo, năo precisa de se registar novamente. Faça logon na <a href="./">Pagina Inicial</a> !</p>
							
							{if !empty($error)}
								<h3 class="error">{$error}</h3>
							{/if}
							<br/>

							
							<form id="register_form" action="register.php?mode=rejestracja&amp;action=create" method="post">
								
								<label for="name">Nome de Utelizador</label><br />
																<input id="name" name="name" type="text" value="" maxlength="50"/>
									<br />
								<label for="password">Senha:</label><br />
																<input id="password" name="password" type="password" value="" maxlength="100"/>
									<br />

								<label for="password_confirm">Confirmar senha:</label><br />
									<input id="password_confirm" name="password_confirm" type="password" value="" maxlength="100"/>
								<br />

								<label for="email">E-Mail:</label><br />
								<span class="small">(Activaçăo necessaria)</span><br />
						

								<input id="email" name="email" type="text" value="" size="40" maxlength="150"/><br />
								
								<div>
								 <table width="100%">
								  <tr>
									<td valign="top" width="20px"><input id="agb" value="1" name="agb" type="checkbox"/></td>
																											<td>
										Ao registrar-se para o jogo que eu aceito os <a href="/rules.php">Termos e Condiçőes</a> e os <a href="">princípios de protecçăo de dados</a>
									</td>

								  </tr>
								 </table>
								</div><br />

								
								<input id="register_button" type="submit" value="Registar" style="margin-top:8px;" />
							</form>
						</div>
						{/if}
						{if $mode == 'powodzenie' && $pokaz}
							<div class="info-block register" style="margin-left:10px">
								<h3>O nome {$username} Foi registado com exito.</h3><br>
								<a href="index.php?log={$username}">Do strony głównej</a>
							</div>
						{/if}
					</div>
					<div class="container-bottom-full"></div>

				</div>
			</div>

		
		
	</body>
</html>


{*
<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tribos Entrada</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js" type="text/javascript"></script>
</head>

<body>
<table class="main" width="800" align="center"><tr><td>
<h1>Registrar</h1>
<h3 style="font-weight:bold">Cada jogador pode jogar apenas uma conta por mundo!</h3>

<p>Se já tem, ou teve, uma conta em algum outro mundo, nao precisa de se registar novamente. Faça logon na <a href="./">Pagina Inicial</a>!</p>


<h3 class="error">{$error}</h3>

<table cellpadding="0" cellspacing="0" align="center">
<tr>
<td style="background-image:url(graphic/border/r1.png)" width="8" height="8"></td>
<td style="background-image:url(graphic/border/r2.png)"></td>
<td style="background-image:url(graphic/border/r3.png)" width="8"></td>
</tr>
<tr>
<td style="background-image:url(graphic/border/r4.png)" height="8"></td>
<td>
	<form action="register.php?action=validate" method="post">
	<table>
	<tr>
	<td>Nome de Usuario:</td><td><input name="name" type="text" value="{$name}" /></td>
	</tr>

	<tr>
	<td>Senha:</td><td><input name="password" type="password" value="" /></td>
	</tr>
	<tr>
	<td>Repetir Senha:</td><td><input name="password_confirm" type="password" value="" /></td>
	</tr>

	<tr>
	<td colspan="2"><label><input name="agb" type="checkbox" />Eu aceito os termos de serviço</label> <a href="javascript:popup_scroll('rules.php', 600, 480)">(Mostrar ANB)</a></td>
	</tr>

	<tr>
	<td colspan="2"><br /><input type="submit" value="Registrieren" /></td>
	</tr>

	</table>
	</form>
</td>
<td style="background-image:url(graphic/border/r5.png)"></td>
</tr>

<tr>
<td style="background-image:url(graphic/border/r6.png)" height="8"></td>
<td style="background-image:url(graphic/border/r7.png)"></td>
<td style="background-image:url(graphic/border/r8.png)"></td>
</tr>

</table>

</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
<div class="closure">&copy; 2009 - 2013 <a href="http://nped.tk">NPED</a>&nbsp;&nbsp;<a href="http://nped.tk/minecraft">Minecraft</a>&nbsp;&nbsp;<a href="http://nped.tk/apoio/">Suporte</a>&middot;</div>	
	</div>
</body>
</html>
*}