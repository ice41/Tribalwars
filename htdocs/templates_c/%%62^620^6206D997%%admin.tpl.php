<?php /* Smarty version 2.6.14, created on 2011-12-23 14:43:52
         compiled from admin.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Plemiona - administracja</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<link rel="stylesheet" type="text/css" href="../stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">
<?php if ($this->_tpl_vars['loging']): ?>
<table class="main" width="840" align="center">
<tr>
<td style="padding:2px;">
	<h2>Administracja - logowanie</h2>
	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br>
	<?php endif; ?>
	<form method="POST" action="admin.php?action=zaloguj">
		hasło: <input type="password" name="pass" value=""><br /><input type="submit" value="Login">
	</form><br /><br />
</td></tr></table>
<?php else: ?>

<table cellspacing="0" width="100%">
	<tr>
		<td width="250" valign="top">

			<table class="main" width="100%"><tr><td>
				<tr>
					<td>
						<table class="vis" width="100%">
							<tr><th>Funkcje podstawowe</th></tr>
							<tr><td><a href="admin.php?screen=index">Edycja strony głównej</a></td></tr>
							<tr><td><a href="admin.php?screen=create_new_server">Utworzenie nowego serwera</a></td></tr>
						</table>
						<br>
						<table class="vis" width="100%">
							<tr><th>Akcje</th></tr>
							<tr><td><a href="admin.php?action=wyloguj">Wyloguj</a></td></tr>
						</table>
					</td>
				</tr>
			</table>
	
		</td>
		<td width="*" valign="top">

			<table class="main" width="100%">
				<tr>
					<td style="padding:2px;">
						<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
							<font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br>
						<?php else: ?>
							<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php endif; ?>
						<?php endif; ?>
						<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">wygenerowany w <?php echo $this->_tpl_vars['load_msec']; ?>
 ms
						Czas z serwera: <span id="serverTime"><?php echo $this->_tpl_vars['date']; ?>
</span></p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script type="text/javascript">startTimer();</script>

<?php endif; ?>
</body>
</html>