<?php /* Smarty version 2.6.14, created on 2014-07-06 22:02:44
         compiled from register.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos NPED</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta name="description" content="Se teve, ou tem, uma conta em algum dos mundo, n�o precisa registar-se novamente. Fa�a logon na Pagina inicial !" />
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
								<?php 
								$lcount = count($this->_tpl_vars["linki"]);
								 ?>
								<?php $_from = $this->_tpl_vars['linki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link'] => $this->_tpl_vars['value']):
?>
									<?php $i++ ?>
									<a href="<?php echo $this->_tpl_vars['link']; ?>
"/><?php echo $this->_tpl_vars['value']; ?>
</a>
									<?php  if ($lcount != $i) echo"-"; ?>
								<?php endforeach; endif; unset($_from); ?>
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
						<?php if ($this->_tpl_vars['mode'] == 'rejestracja'): ?>
						<div class="info-block register" style="margin-left:10px">
															<h2>Registar no mundo <?php echo $this->_tpl_vars['serwer']; ?>
 <a href="world.php">&raquo; Escolher outro mundo</a></h2>

														<h3>Cada Jogador s� pode ter uma conta por mundo!</h3>

							<p>Se j� tem, ou teve, uma conta em algum outro mundo, n�o precisa de se registar novamente. Fa�a logon na <a href="./">Pagina Inicial</a> !</p>
							
							<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
								<h3 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h3>
							<?php endif; ?>
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
								<span class="small">(Activa��o necessaria)</span><br />
						

								<input id="email" name="email" type="text" value="" size="40" maxlength="150"/><br />
								
								<div>
								 <table width="100%">
								  <tr>
									<td valign="top" width="20px"><input id="agb" value="1" name="agb" type="checkbox"/></td>
																											<td>
										Ao registrar-se para o jogo que eu aceito os <a href="/rules.php">Termos e Condi��es</a> e os <a href="">princ�pios de protec��o de dados</a>
									</td>

								  </tr>
								 </table>
								</div><br />

								
								<input id="register_button" type="submit" value="Registar" style="margin-top:8px;" />
							</form>
						</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'powodzenie' && $this->_tpl_vars['pokaz']): ?>
							<div class="info-block register" style="margin-left:10px">
								<h3>O nome <?php echo $this->_tpl_vars['username']; ?>
 Foi registado com exito.</h3><br>
								<a href="index.php?log=<?php echo $this->_tpl_vars['username']; ?>
">Do strony g��wnej</a>
							</div>
						<?php endif; ?>
					</div>
					<div class="container-bottom-full"></div>

				</div>
			</div>

		
		
	</body>
</html>

