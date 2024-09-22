<?php /* Smarty version 2.6.14, created on 2012-02-10 22:13:14
         compiled from game_overview_villages_groups.tpl */ ?>
<?php if ($this->_tpl_vars['sekcja']): ?>
	<table class="vis" width="810">
		<tr>
			<td>
				<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>
 
			</td>
		</tr>
	</table>
<?php endif; ?>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=groups&amp;action=edit_groups&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis overview_table" width="100%">
		<tbody>
			<tr>
				<th width="280">Wioska</th>
				<th>Punkty</th>
				<th>Zagroda</th>
				<th>Grupy</th>
			</tr>

			<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
				<tr <?php if ($this->_tpl_vars['village']['id'] == $this->_tpl_vars['arr_id']): ?>class="selected"<?php else:  if (! $this->_tpl_vars['id']['parzysta_liczba']): ?>class="row_b"<?php else: ?>class="row_a"<?php endif;  endif; ?>>
					<td>
						<input name="village_ids_<?php echo $this->_tpl_vars['arr_id']; ?>
" value="<?php echo $this->_tpl_vars['arr_id']; ?>
" type="checkbox">

						<span id="label_<?php echo $this->_tpl_vars['arr_id']; ?>
">
							<?php echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['bonus']); ?>

							<a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=overview">
								<span><?php echo $this->_tpl_vars['id']['name']; ?>
 (<?php echo $this->_tpl_vars['id']['x']; ?>
|<?php echo $this->_tpl_vars['id']['y']; ?>
) K<?php echo $this->_tpl_vars['id']['continent']; ?>
</span>
							</a>
						</span>
					</td>
					
					<td><?php echo $this->_tpl_vars['id']['points']; ?>
</td>
					<td><?php echo $this->_tpl_vars['id']['r_bh']; ?>
 / <?php echo $this->_tpl_vars['id']['max_farm']; ?>
</td>
					<?php if ($this->_tpl_vars['id']['group'] === 'all'): ?>
						<td class="inactive">nie przyporz¹dkowane</td>
					<?php else: ?>
						<td><?php echo $this->_tpl_vars['id']['group']; ?>
</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr>
				<th colspan="6">
					<input id="select_all" class="selectAll" onchange="selectAll(this.form, this.checked)" type="checkbox"> <label for="select_all"><b>zaznacz wszystkie</b></label>
				</th>
			</tr>
		</tbody>
	</table>

	<select name="selected_group">
		<?php $_from = $this->_tpl_vars['user_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
			<option value="<?php  echo base64_encode($this->_tpl_vars['group']); ?>"><?php echo $this->_tpl_vars['group']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
	</select>
	
	<input name="add_to_group" value="Dodaj" type="submit">
	<input name="remove_from_group" value="Usuñ" type="submit">
</form>