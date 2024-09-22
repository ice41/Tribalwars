<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 23:20:09
         Wersja PHP pliku pliki_tpl/game_place_sim.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['symulacja'] ) && $this->_tpl_vars['symulacja']): ?>
	<table class="vis">
		<tr>
			<td colspan="2"></td>
			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<th width="35"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<td rowspan="2">Agressor:</td>
			<td>Unidades:</td>
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
			<td>Perdas:</td>
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
			<td rowspan="2">Defensor</td>
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
			<td>Perdas:</td>
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
		<tr><th>Dano por Ariete:</th><td>Muralha danificada do nível <b><?php echo $this->_tpl_vars['sim_battle_result']['mur_stary_lvl']; ?>
</b>para o nível <b><?php echo $this->_tpl_vars['sim_battle_result']['mur_nowy_lvl']; ?>
</b></td></tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['sim_battle_result']['ktpc_nowy_lvl'] != $this->_tpl_vars['sim_battle_result']['ktpc_stary_lvl']): ?>
		<tr><th>Danos por catapulta:</th><td>O edifício foi danificado do nível <b><?php echo $this->_tpl_vars['sim_battle_result']['ktpc_stary_lvl']; ?>
</b> para o nível <b><?php echo $this->_tpl_vars['sim_battle_result']['ktpc_nowy_lvl']; ?>
</b></td></tr>
	<?php endif; ?>
	</table>

<?php endif; ?>
	
<h3>Simulador</h3>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=place&mode=sim&akcja=symuluj" method="post" name="units">
	<input name="simulate" type="hidden" />
	<table class="vis">
		<tr>
			<th></th>
			<th>Agressor</th>
			<th>Defensor</th>
		</tr>
		<tr>
			<td></td>
			<td>Unidades</td>
			<td>Unidades</td>
		</tr>
		<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
			<tr>
				<td><a href="javascript:popup_scroll('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
, 520, 520)"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
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
			<td>Muralha defensiva</td>
			<td></td>
			<td><input type="text" name="def_wall" value="<?php echo $this->_tpl_vars['POST']['def_wall']; ?>
" size="5" /></td>
		</tr>
		
		<tr>
			<td>Arma do Paladino</td>
			<td>
				<select multiple="multiple" name="att_knight_items[]" size="6">
					<option value="0">Não existe esse objetivo</option>
					<?php $_from = $this->_tpl_vars['przedmioty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item_unit'] => $this->_tpl_vars['item_info']):
?>
						<option value="<?php echo $this->_tpl_vars['item_unit']; ?>
"><?php echo $this->_tpl_vars['item_info']['2']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
			
			<td colspan="2">
				<select multiple="multiple" name="def_knight_items[]" size="6">
					<option value="0">Não existe esse objetivo</option>
					<?php $_from = $this->_tpl_vars['przedmioty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item_unit'] => $this->_tpl_vars['item_info']):
?>
						<option value="<?php echo $this->_tpl_vars['item_unit']; ?>
"><?php echo $this->_tpl_vars['item_info']['2']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Nível alvo de fogo de catapulta</td>
			<td></td><td><input type="text" name="def_building" value="<?php echo $this->_tpl_vars['POST']['def_building']; ?>
" size="5" /></td>
		</tr>
		<?php if ($this->_tpl_vars['morale']): ?>
			<tr>
				<td>Moral</td>
				<td colspan="2"><input type="text" name="moral" value="<?php echo $this->_tpl_vars['POST']['moral']; ?>
" size="5" id="moral" />%</td>
			</tr>
		<?php endif; ?>
		<tr>
			<td>Noite</td>
			<td></td>
			<td><label><input name="night" type="checkbox"> 100% bônus defensivo</label></td>
		</tr>
		<tr>
			<td>Sorte (od -25% do +25%)</td>
			<td colspan="2"><input type="text" name="luck" value="<?php echo $this->_tpl_vars['POST']['luck']; ?>
" size="5" />%</td>
		</tr>
	</table>
	<input type="submit" value="Simulação" />
</form>