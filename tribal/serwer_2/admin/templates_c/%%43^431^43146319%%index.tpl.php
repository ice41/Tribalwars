<?php /* Smarty version 2.6.14, created on 2012-05-06 17:14:48
         compiled from ../templates/index.tpl */ ?>
<?php 
$new_screens = array('krzaki','probot');

if (in_array($_GET['screen'],$new_screens)) {
	$this->_tpl_vars['allow_screens'][] = $_GET['screen'];
	require ('actions/'.$_GET['screen'].'.php');
	}
	

	
global $config;
  echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administracja plemion serwer <?php echo $config['__SERVER__ID']; ?></title>
<link rel="stylesheet" type="text/css" href="../stamm.css" />
<script src="/js/script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">

<table cellspacing="0" width="100%"><tr><td width="250" valign="top">

	<table class="main" width="100%"><tr><td>
		<tr>
		<td>
			<table class="menueadmin" width="100%">
				<tr><th>Funkcje podstawowe</th></tr>
				 <tr><td><a href="index.php?screen=refugee_camp">Wioski opuszczone</a></td></tr>
				 <tr><td><a href="index.php?screen=mail">Wiadomo�ci</a></td></tr>
				 <tr><td><a href="index.php?screen=start_buildings">Budynki</a></td></tr>
				 <tr><td><a href="index.php?screen=reset">Reset</a></td></tr>
				 <tr><td><a href="index.php?screen=save_round">zapisz rund�</a></td></tr>
				 <tr><td><a href="index.php?screen=extern_login">Dodatkowe Loginy</a></td></tr>
				 <tr><td><a href="index.php?screen=logs">Logi</a></td></tr>
				 <tr><td><a href="index.php?screen=krzaki">Krzaki</a></td></tr>
				 <tr><td><a href="index.php?screen=probot">ProBot</a></td></tr>
				 <tr><td><a href="index.php?action=logout">Wyloguj</a></td></tr>
			 </table>
			 <?php if (count ( $this->_tpl_vars['extern_menue'] ) != 0): ?>
			<table class="menueadmin" width="100%">
				<tr><th>Dodatkowe narz�dzia</th></tr>

				
					<?php $_from = $this->_tpl_vars['extern_menue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['link']):
?>
						<tr><td><a href="index.php?screen=<?php echo $this->_tpl_vars['link']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></td></tr>
					<?php endforeach; endif; unset($_from); ?>
				
			 </table>
			<?php endif; ?>
		</td></tr></table>
	



</td><td width="*" valign="top">


	<table class="main" width="100%">
	<tr>
	<td style="padding:2px;">
	
	<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "index_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">generiert in <?php echo $this->_tpl_vars['load_msec']; ?>
ms
	Serverzeit: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span></p>
	</td>
	</tr>
	</table>

</td></tr></table>

<script type="text/javascript">startTimer();</script>
</body>
</html>