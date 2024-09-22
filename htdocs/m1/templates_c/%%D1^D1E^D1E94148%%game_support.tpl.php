<?php /* Smarty version 2.6.14, created on 2016-12-22 21:37:16
         compiled from game_support.tpl */ ?>
<?php 
	$this->_tpl_vars['mode'] = $_GET['mode'];
	if(empty($_GET['mode'])){
		$this->_tpl_vars['mode'] = 'tickets';
	}
 ?>
<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'tickets'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=support&amp;mode=tickets"><?php if ($this->_tpl_vars['mode'] == 'tickets'): ?>&raquo; <?php endif; ?>Meus tickets</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'open'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=support&amp;mode=open"><?php if ($this->_tpl_vars['mode'] == 'open'): ?>&raquo; <?php endif; ?>Abrir novo ticket</a></td></tr>
	</table>
</td>
<td width="80%">
	<table width="100%">
		<tr><td><h2>Suporte</h2></td></tr>
		<tr><td valign="top" width="100%"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_support_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td></tr>
	</table>
</td>