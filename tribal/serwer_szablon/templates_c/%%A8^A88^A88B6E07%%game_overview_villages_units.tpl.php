<?php /* Smarty version 2.6.14, created on 2012-04-28 15:22:04
         compiled from game_overview_villages_units.tpl */ ?>
<?php if ($this->_tpl_vars['sekcja']): ?>
	<table class="vis" width="810">
		<tr>
			<td>
				<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>
 
			</td>
		</tr>
	</table>
<?php endif; ?>
<table class="vis">
	<tr>
		<th>Wioska</th>
		<th></th>
		
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<th width="35"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
	
		<th>Akcja</th>
	</tr>
	
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
		<tr>
			<td rowspan="3" valign="top">
				<a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>
</a>
			</td>
			<td <?php if ($this->_tpl_vars['graphic'] == '1'): ?>class="selected"<?php endif; ?>>w³asne</td>
			
			<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
				<?php if ($this->_tpl_vars['id']['own_units'][$this->_tpl_vars['dbname']] == 0): ?>
						<td class="hidden<?php if ($this->_tpl_vars['graphic'] == '1'): ?> selected<?php endif; ?>"><?php echo $this->_tpl_vars['id']['own_units'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php else: ?>
						<td <?php if ($this->_tpl_vars['graphic'] == '1'): ?>class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['id']['own_units'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=place&amp;">Rozkaz</a></td>
		</tr>
		<tr class="units_there">
			<td>wszystkie</td>
			
			<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
				<?php if ($this->_tpl_vars['id']['all_units'][$this->_tpl_vars['dbname']] == 0): ?>
						<td class="hidden"><?php echo $this->_tpl_vars['id']['all_units'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php else: ?>
						<td><?php echo $this->_tpl_vars['id']['all_units'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=place&amp;mode=units">Wojsko</a></td>
		</tr>
		<tr class="units_away">
			<td>po za wiosk¹</td>
			
			<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
				<?php if ($this->_tpl_vars['id']['outward'][$this->_tpl_vars['dbname']] == 0): ?>
						<td class="hidden"><?php echo $this->_tpl_vars['id']['outward'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php else: ?>
						<td><?php echo $this->_tpl_vars['id']['outward'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<td></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	
</table>