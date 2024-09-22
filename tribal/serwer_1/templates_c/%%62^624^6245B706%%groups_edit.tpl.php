<?php /* Smarty version 2.6.14, created on 2013-12-24 15:56:48
         compiled from groups_edit.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<span class="error"/><?php echo $this->_tpl_vars['error']; ?>
</span>
	<br><br>
<?php endif; ?>
		
<a href="#" onclick="switchDisplay('group_config')"/>»&nbsp; Edytuj grupy</a>
<div id="group_config" class="group_config" style="display: none;">
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=create_group&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		Utwórz grupê:<input type="text" name="group_name"> <input value="OK" name="sub" type="submit">
	</form>
		
	<table class="vis" width="100%"/>
		<tr height="23">
			<th>Grupy</th>
			<th width="25"></th>
		</tr>
		<?php $_from = $this->_tpl_vars['user_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name']):
?>
			<tr height="23">
				<td <?php if ($this->_tpl_vars['user']['aktu_group'] === $this->_tpl_vars['group_name']): ?>class="selected"<?php endif; ?>><a href="game.php?village<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=change_group&group=<?php  echo base64_encode($this->_tpl_vars['group_name']); ?>&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><?php  echo entparse($this->_tpl_vars['group_name']); ?></td>
				<td <?php if ($this->_tpl_vars['user']['aktu_group'] === $this->_tpl_vars['group_name']): ?>class="selected"<?php endif; ?>><a href="game.php?village<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=del_group&group=<?php  echo base64_encode($this->_tpl_vars['group_name']); ?>&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/delete.png" alt="usuñ"/></a></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr height="20">
			<td <?php if ($this->_tpl_vars['user']['aktu_group'] === 'all'): ?>class="selected"<?php endif; ?>><a href="game.php?village<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=change_group&group=<?php  echo base64_encode('all'); ?>&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"/>Wszystkie</td>
			<td <?php if ($this->_tpl_vars['user']['aktu_group'] === 'all'): ?>class="selected"<?php endif; ?>></td>
		</tr>
	</table>
</div>
<hr size="3">