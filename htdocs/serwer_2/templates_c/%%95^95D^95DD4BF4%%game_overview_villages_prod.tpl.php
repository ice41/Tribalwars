<?php /* Smarty version 2.6.14, created on 2012-01-29 00:01:06
         compiled from game_overview_villages_prod.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'game_overview_villages_prod.tpl', 22, false),)), $this); ?>
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
<th>Wioska</th><th>Punkty</th><th>Surowce</th><th>Spichlerz</th><th>Zagroda</th>
<th>Budowanie</th><th>Badanie</th><th>Rekrutacja</th>
</tr>

<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
	<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['parzysta_liczba']): ?>
	<tr>
		<td><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="graphic/command/attack.png"> <?php endif;  echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['bonus']); ?>
<a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>
</a></td>
		<td><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['points']; ?>
</td>
		<td><img src="graphic/holz.png" title="Drewno" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="graphic/lehm.png" title="Kamienie" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="graphic/eisen.png" title="¯elazo" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> </td>
		<td><img src="graphic/res.png" title="Spichlerz" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
		<td><img src="graphic/face.png" title="Wieœniak" alt="" /><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']; ?>
</td>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
			<td><img src="graphic/buildings/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
.png" alt="" /></td>

		<?php else: ?>
		    <td></td>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
			<td><b><img src="graphic/unit/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
.png" alt="" /></td>

		<?php else: ?>
		    <td></td>
		<?php endif; ?>
		<td><?php $_from = $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['recruits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id_rec'] => $this->_tpl_vars['arr_rec']):
?><img src="graphic/unit/<?php echo $this->_tpl_vars['arr_rec']['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['arr_rec']['num']; ?>
 <?php echo $this->_tpl_vars['arr_rec']['unit']; ?>
" alt=""><?php endforeach; endif; unset($_from); ?></td>
	</tr>
	<?php else: ?>
	<tr class="lp">
		<td><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="graphic/command/attack.png"> <?php endif;  echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['bonus']); ?>
<a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>
</a></td>
		<td><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['points']; ?>
</td>
		<td><img src="graphic/holz.png" title="Drewno" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="graphic/lehm.png" title="Kamienie" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="graphic/eisen.png" title="¯elazo" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> </td>
		<td><img src="graphic/res.png" title="Spichlerz" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
		<td><img src="graphic/face.png" title="Wieœniak" alt="" /><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']; ?>
</td>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
			<td><img src="graphic/buildings/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
.png" alt="" /></td>

		<?php else: ?>
		    <td></td>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
			<td><b><img src="graphic/unit/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
.png" alt="" /></td>

		<?php else: ?>
		    <td></td>
		<?php endif; ?>
		<td><?php $_from = $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['recruits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id_rec'] => $this->_tpl_vars['arr_rec']):
?><img src="graphic/unit/<?php echo $this->_tpl_vars['arr_rec']['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['arr_rec']['num']; ?>
 <?php echo $this->_tpl_vars['arr_rec']['unit']; ?>
" alt=""><?php endforeach; endif; unset($_from); ?></td>
	</tr>
	<?php endif;  endforeach; endif; unset($_from); ?>

</table>