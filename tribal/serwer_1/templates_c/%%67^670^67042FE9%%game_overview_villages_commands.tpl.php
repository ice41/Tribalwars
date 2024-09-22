<?php /* Smarty version 2.6.14, created on 2016-08-26 20:48:45
         compiled from game_overview_villages_commands.tpl */ ?>
<?php if ($this->_tpl_vars['sekcja_rozkazy']): ?>
	<table class="vis">
		<tr>
			<td>
				<?php echo $this->_tpl_vars['sekcja_rozkazy_content']; ?>
 
			</td>
		</tr>
	</table>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
<table class="vis">
<tr><th>Rozkaz</th><th>Pochodzenie</th><th>Na miejscu</th>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<th width="30"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
</tr>
		<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
			<tr <?php if ($this->_tpl_vars['array']['parzysta_liczba']): ?> class="row_b"<?php else: ?> class="row_a"<?php endif; ?>>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own"><?php echo $this->_tpl_vars['array']['message']; ?>
</a></td>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['array']['homevillageid']; ?>
"><?php echo $this->_tpl_vars['array']['homevillagename']; ?>
</a></td>
				<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['array']['arrival_in']); ?>
</td>
				<?php $_from = $this->_tpl_vars['array']['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num']):
?>
					<?php if ($this->_tpl_vars['num'] == 0): ?>
						<td class="hidden">0</td>
					<?php else: ?>
						<td><?php echo $this->_tpl_vars['num']; ?>
</td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>	
</table>
<?php else: ?>
<br>
W tej chwili nie ma ¿adnych ruchów twoich wojsk
<?php endif; ?>