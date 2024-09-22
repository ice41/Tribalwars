<?php /* Smarty version 2.6.14, created on 2011-12-15 22:30:27
         compiled from ../templates/help.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hilfe</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>

<body >
<table class="main" width="800" align="center"><tr><td>
<h2>Hilfe</h2>

<table width="100%"><tr><td valign="top" width="120">
<table class="vis">
<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
	<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
		<tr>
			<td class="selected" width="120"><a href="help.php?mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a></td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="120"><a href="help.php?mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a></td>
		</tr>	
	<?php endif;  endforeach; endif; unset($_from); ?>
</table>

</td><td valign="top" align="left">

<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

</td></tr></table>
</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>