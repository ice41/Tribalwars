<?php /* Smarty version 2.6.14, created on 2012-03-19 22:25:43
         compiled from game_ally_in_ally.tpl */ ?>
<?php 
$this->_tpl_vars['links']['Dyplomacja'] = 'kontrakty';
$this->_tpl_vars['links']['Planer podbojów'] = 'reservations';
$this->_tpl_vars['links']['Forum'] = 'forum';
$this->_tpl_vars['pl_trans'] = array('overview' => 'Przegl¹d','members' => 'Cz³onkowie','invite' => 'Zaproszenia','properties' => 'Ustawienia','kontrakty' => 'Dyplomacja','profile' => 'Profil','reservations' => 'Planer podbojów','forum' => 'Forum');
 ?>
<h2><?php echo $this->_tpl_vars['ally']['name']; ?>
</h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<h2 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h2>
<?php endif; ?>
<table class="vis">
	<tr>
		<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
			<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
				<td class="selected" width="100">
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
				</td>
			<?php else: ?>
				<td width="100">
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
				</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>
<br />

<?php if ($this->_tpl_vars['mode'] == 'profile'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_info_ally.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['mode'] == 'rights'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ally_in_ally_rights.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['links'] )): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ally_in_ally_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endif; ?>