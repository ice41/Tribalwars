<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:19
         compiled from game_overview.tpl */ ?>
<?php 
	$userid = $this->_tpl_vars['user']['id'];
	$v = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'")) or die(mysql_error());
	if($v['overview'] == 'old'){
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_overview_noGraphics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php 
	}else{
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_overview_Graphics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php 
	}
 ?>