<?php /* Smarty version 2.6.14, created on 2012-01-12 22:18:02
         compiled from game_place_sim.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['symulacja'] ) && $this->_tpl_vars['symulacja']): ?>
	<table class="vis">
		<tr>
			<td colspan="2"></td>
			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<th width="35"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<td rowspan="2">Agresor:</td>
			<td>Jednostki:</td>
			<?php $_from = $this->_tpl_vars['wojsko_napastnika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
				<?php if ($this->_tpl_vars['val'] == 0): ?>
					<td class="hidden">0</td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['val']; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<td>Straty:</td>
			<?php $_from = $this->_tpl_vars['sim_battle_result']['jednostki_att_straty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
				<?php if ($this->_tpl_vars['val'] == 0): ?>
					<td class="hidden">0</td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['val']; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<td style="display:none"></td>
		</tr>
		<tr>
			<td rowspan="2">Obroñca</td>
			<td>Jednostki:</td>
			<?php $_from = $this->_tpl_vars['wojsko_obroncy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
				<?php if ($this->_tpl_vars['val'] == 0): ?>
					<td class="hidden">0</td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['val']; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<td>Straty:</td>
			<?php $_from = $this->_tpl_vars['sim_battle_result']['jednsotki_def_straty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
				<?php if ($this->_tpl_vars['val'] == 0): ?>
					<td class="hidden">0</td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['val']; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
	<table class="vis">
	<?php if ($this->_tpl_vars['sim_battle_result']['mur_nowy_lvl'] != $this->_tpl_vars['sim_battle_result']['mur_stary_lvl']): ?>
		<tr><th>Uszkodzenie przez tarany:</th><td>Mur uszkodzony z poziomu <b><?php echo $this->_tpl_vars['sim_battle_result']['mur_stary_lvl']; ?>
</b> do poziomu <b><?php echo $this->_tpl_vars['sim_battle_result']['mur_nowy_lvl']; ?>
</b></td></tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['sim_battle_result']['ktpc_nowy_lvl'] != $this->_tpl_vars['sim_battle_result']['ktpc_stary_lvl']): ?>
		<tr><th>Uszkodzenia zadane przez katapultê:</th><td>Budynek uszkodzony z poziomu <b><?php echo $this->_tpl_vars['sim_battle_result']['ktpc_stary_lvl']; ?>
</b> do poziomu <b><?php echo $this->_tpl_vars['sim_battle_result']['ktpc_nowy_lvl']; ?>
</b></td></tr>
	<?php endif; ?>
	</table>

<?php endif; ?>
	
<h3>Symulator</h3>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=place&mode=sim&akcja=symuluj" method="post" name="units">
	<input name="simulate" type="hidden" />
	<table class="vis">
		<tr>
			<th></th>
			<th>Agresor</th>
			<th>Obroñca</th>
		</tr>
		<tr>
			<td></td>
			<td>Jednostki</td>
			<td>Jednostki</td>
		</tr>
		<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
			<tr>
				<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
, 520, 520)"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
				<td><input type="text" name="att_<?php echo $this->_tpl_vars['dbname']; ?>
" size="5" value="<?php echo $this->_tpl_vars['wojsko_napastnika'][$this->_tpl_vars['dbname']]; ?>
" /></td>
				<td><input type="text" name="def_<?php echo $this->_tpl_vars['dbname']; ?>
" size="5" value="<?php echo $this->_tpl_vars['wojsko_obroncy'][$this->_tpl_vars['dbname']]; ?>
" /></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td>Mur obronny</td>
			<td></td>
			<td><input type="text" name="def_wall" value="<?php echo $this->_tpl_vars['POST']['def_wall']; ?>
" size="5" /></td>
		</tr>
		
		<tr>
			<td>Przedmioty</td>
			<td>
				<select multiple="multiple" name="att_knight_items[]" size="6">
					<option value="0">Nie ma ¿adnego przedmiotu</option>
					<option value="unit_spear">Halabarda szwajcarska </option>
					<option value="unit_sword">D³ugi miecz Ulricha</option>
					<option value="unit_axe">Wojowniczy topór Thorgarda</option>
					<option value="unit_archer">Wielki ³uk Edwarda</option>
					<option value="unit_spy">Luneta Kalida</option>
					<option value="unit_light">Lanca Mieszka</option>

					<option value="unit_heavy">Flaga Baptysty</option>
					<option value="unit_marcher">£uk refleksyjny Khana</option>
					<option value="unit_ram">Wekiera Carlosa</option>
					<option value="unit_catapult">Ogieñ olimpijski</option>
					<option value="unit_snob">Ber³o Vasca</option>
				</select>
			</td>
			
			<td colspan="2">
				<select multiple="multiple" name="def_knight_items[]" size="6">
					<option value="0">Nie ma ¿adnego przedmiotu</option>
					<option value="unit_spear">Halabarda szwajcarska </option>
					<option value="unit_sword">D³ugi miecz Ulricha</option>
					<option value="unit_axe">Wojowniczy topór Thorgarda</option>

					<option value="unit_archer">Wielki ³uk Edwarda</option>
					<option value="unit_spy">Luneta Kalida</option>
					<option value="unit_light">Lanca Mieszka</option>
					<option value="unit_heavy">Flaga Baptysty</option>
					<option value="unit_marcher">£uk refleksyjny Khana</option>
					<option value="unit_ram">Wekiera Carlosa</option>

					<option value="unit_catapult">Ogieñ olimpijski</option>
					<option value="unit_snob">Ber³o Vasca</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Poziom celu ostrza³u katapultami</td>
			<td></td><td><input type="text" name="def_building" value="<?php echo $this->_tpl_vars['POST']['def_building']; ?>
" size="5" /></td>
		</tr>
		<?php if ($this->_tpl_vars['morale']): ?>
			<tr>
				<td>Morale</td>
				<td colspan="2"><input type="text" name="moral" value="<?php echo $this->_tpl_vars['POST']['moral']; ?>
" size="5" id="moral" />%</td>
			</tr>
		<?php endif; ?>
		<tr>
			<td>Noc</td>
			<td></td>
			<td><label><input name="night" type="checkbox"> 100% bonus obronny</label></td>
		</tr>
		<tr>
			<td>Szczêœcie (od -25% do +25%)</td>
			<td colspan="2"><input type="text" name="luck" value="<?php echo $this->_tpl_vars['POST']['luck']; ?>
" size="5" />%</td>
		</tr>
	</table>
	<input type="submit" value="Symulacja" />
</form>