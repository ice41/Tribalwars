<?php /* Smarty version 2.6.14, created on 2012-11-14 12:01:49
         compiled from ../templates/index.tpl */ ?>
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
						<?php if (count ( $this->_tpl_vars['extern_menue'] ) != 0): ?>
						<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
							<tr><th>Tool-uri</th></tr>
							<?php $_from = $this->_tpl_vars['extern_menue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['link']):
?>
							<tr><td<?php if ($this->_tpl_vars['screen'] == $this->_tpl_vars['link']): ?> class="selected"<?php endif; ?>><a href="index.php?screen=<?php echo $this->_tpl_vars['link']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></td></tr>
							<?php endforeach; endif; unset($_from); ?>
						 </table>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		</td>
		<td width="*" valign="top">
			<table class="main" width="98%" align="center">
				<tr>
					<td style="padding:2px;">
					<?php if ($this->_tpl_vars['screen'] == 'mass_mail'): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "index_mass_mail.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php elseif (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "index_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
						<p align="right" style="font-size: 10px; margin-top:0px; margin-bottom:0px">Gerado em <?php echo $this->_tpl_vars['load_msec']; ?>
ms | 
						Hora do Servidor: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span> | <?php echo date("d.m.Y"); ?></p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">startTimer();</script>
</body>
</html>