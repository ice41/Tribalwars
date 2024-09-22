<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 22:49:23
         Wersja PHP pliku pliki_tpl/groups_edit.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<span class="error"/><?php echo $this->_tpl_vars['error']; ?>
</span>
	<br><br>
<?php endif; ?>
		
<a href="#" onclick="switchDisplay('group_config')"/>&nbsp; Editar grupos</a>
<div id="group_config" class="group_config" style="display: none;">
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=create_group&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		Crie um grupo:<input type="text" name="group_name"> <input value="OK" name="sub" type="submit">
	</form>
		
	<table class="vis" width="100%"/>
		<tr height="23">
			<th>Grupy</th>
			<th width="25"></th>
		</tr>
		<?php $_from = $this->_tpl_vars['user_grocusto']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
"/><img src="/ds_graphic/delete.png" alt="Excluir"/></a></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr height="20">
			<td <?php if ($this->_tpl_vars['user']['aktu_group'] === 'all'): ?>class="selected"<?php endif; ?>><a href="game.php?village<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=change_group&group=<?php  echo base64_encode('all'); ?>&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"/>Tudo</td>
			<td <?php if ($this->_tpl_vars['user']['aktu_group'] === 'all'): ?>class="selected"<?php endif; ?>></td>
		</tr>
	</table>
</div>
<hr size="3">