<?php /* Smarty version 2.6.14, created on 2012-12-29 06:44:21
         compiled from game_overview_villages.tpl */ ?>
<table class="vis">
	<tr>
<?php if ($_GET['mode'] == 'groups'): ?>
  <?php $this->assign('mode', 'groups'); ?>
<?php endif; ?>
	<?php if (combined == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=combined">Combinat</a></td>
	<?php else: ?>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=combined">Combinat</a></td>	
	<?php endif; ?>
		<?php if (prod == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=prod">Productie</a></td>
	<?php else: ?>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=prod">Productie</a></td>	
	<?php endif; ?>
		<?php if (units == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=units">Trupe</a></td>
	<?php else: ?>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=units">Trupe</a></td>	
	<?php endif; ?>
		<?php if (commands == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=commands">Comenzi</a></td>
	<?php else: ?>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=commands">Comenzi</a></td>	
	<?php endif; ?>
		<?php if (incomings == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings">Sosiri</a></td>
	<?php else: ?>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings">Sosiri</a></td>	
	<?php endif; ?>
                <?php if (incomings == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=groups">Grupe</a></td>
	<?php else: ?>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=groups">Grupe</a></td>	
	<?php endif; ?>
	</tr>
</table>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_overview_villages_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>